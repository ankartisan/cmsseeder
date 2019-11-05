<?php
namespace Project\Services;

use App\Models\Asset;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class FileService {

    const FILES_DIR = "files";

    const ROOT_FILES_DIR = "public/files";

    public static function createThumbnail($filePath, $options = [])
    {
        $dir = public_path("files/tmp/thumb");
        $filename = self::getFileNameFromPath($filePath);

        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $manager = new ImageManager(array('driver' => 'gd'));
        $img = $manager->make($filePath)->fit(250);
        $img->save($dir."/".$filename);
        $thumbPath = $dir.'/'.$filename;

        return $thumbPath;
    }

    public static function getFileNameFromPath($filePath)
    {
        $filenameArr = explode("/",$filePath);
        return $filenameArr[count($filenameArr) - 1];
    }

    public static function saveFileLocal($uploadedFile)
    {
        $dir = public_path(self::FILES_DIR);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = $uploadedFile->getClientOriginalName();
        $filePath = self::FILES_DIR.'/'.$filename;
        $uploadedFile->move($dir,$filename);

        return $filePath;
    }

    public static function saveRemoteFileLocal($url)
    {
        $dirPath = "files/tmp";
        $dir = public_path($dirPath);
        if (!file_exists($dir)) {
            mkdir($dir, 0777, true);
        }

        $filename = sha1(uniqid(mt_rand(), true)).".jpg";
        $filePath = $dirPath.'/'.$filename;

        file_put_contents($filePath, fopen($url, 'r'));

        return $filePath;
    }

    /**
     * @param $filePath
     * @param array $options
     *              - size (int): new image width ( automatic height to keep aspect ratio)
     *              - newFile (boolean): save new image od different destination
     *              - filename (string): current filename
     * @return string
     */
    public static function resizeImage($filePath, $options = [])
    {
        $size = isset($options['size']) ? $options['size'] : 960;

        $manager = new ImageManager(array('driver' => 'imagick'));
        $img = $manager->make($filePath)->resize($size, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        // If newFile and filename are sent, create new filename based on size ( ex. filename_width.jpg )
        if(isset($options['newFile']) && isset($options['filename'])) {
            $nameArr = explode(".", $options['filename']);
            $nameArr[count($nameArr) - 2] = $nameArr[count($nameArr) - 2]."_".$size;
            $name = implode(".", $nameArr);

            $filePath = self::FILES_DIR."/".$name;
        }

        $img->save($filePath, 100);

        return $filePath;
    }

}