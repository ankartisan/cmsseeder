<?php

namespace App\Models;

use App\Mail\UserResetPasswordMail;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Project\Services\FileService;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Auth\Passwords\CanResetPassword as ResetPassword;
use Project\Services\AwsService;


class User extends Model implements AuthenticatableContract,AuthorizableContract,CanResetPasswordContract
{
    use Authenticatable, Authorizable, HasRoles, ResetPassword, Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['username', 'first_name', 'last_name', 'email', 'password', 'confirmation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /*
    |--------------------------------------------------------------------------
    | RELATIONSHIPS
    |--------------------------------------------------------------------------
    */

    public function avatar()
    {
        return $this->hasOne(Asset::class, 'entity_id', 'id')->where(["entity_type"=>User::class, "type" => Asset::USER_TYPE_AVATAR]);
    }

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function setUsernameAttribute($value)
    {
        $this->attributes['username'] = $value ? $value : $this->first_name." ".$this->last_name;
    }

    public function getSocialAccountAttribute()
    {
        return $this->facebook_id ? true : false;
    }

    /*
    |--------------------------------------------------------------------------
    | DOMAIN METHODS
    |--------------------------------------------------------------------------
    */

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        Mail::send(new UserResetPasswordMail($this,$token));
    }

    /**
     * Upload local file to Amazon S3
     * @param $filePath
     * @return mixed
     */
    public function uploadPhoto($filePath)
    {
        if ($filePath == "") {
            return false;
        }

        $filename = FileService::getFileNameFromPath($filePath);
        $key = 'users/' . $this->id . '/' . $filename;

        $filePath = FileService::createThumbnail($filePath);

        $result = AwsService::uploadToS3($key, $filePath);

        if (!$result["status"]) {
            return $result;
        }

        if($this->avatar) {
            AwsService::removeFromS3($this->avatar->path);
            $this->avatar->delete();
        }

        $newFile = new Asset([
            'name' => $filename,
            'path' => $key,
            'entity_id' => $this->id,
            'entity_type' => self::class,
            'type' => Asset::USER_TYPE_AVATAR,
        ]);

        $newFile->save();

        // SAVE THUMB
//        $thumbPath = FileService::createThumbnail($filePath);
//        $key = 'users/' . $this->id . '/250x250/' . $filename;
//        AwsService::uploadToS3($key,$thumbPath);

        return ["status" => true, "message" => "Successfully", "data" => $newFile];
    }


    public static function search($request)
    {
        $query = (new User())->newQuery();
        $query->select('users.*');

        if($request->has('search')) {
            $search = $request->get('search');

            $query->where(function ($query) use ($search) {
                $query->where('users.username', 'LIKE', '%'.$search.'%');
                $query->orWhere('users.first_name', 'LIKE', '%'.$search.'%');
                $query->orWhere('users.last_name', 'LIKE', '%'.$search.'%');
                $query->orWhere('users.email', 'LIKE', '%'.$search.'%');
            });
        }

        if($request->has('sort')) {
            $query->orderBy('users.'.$request->get('sort'), $request->get('order'));
        } else {
            $query->orderBy('users.created_at', 'desc');
        }

        $query->distinct();

        return $query->paginate();
    }

}
