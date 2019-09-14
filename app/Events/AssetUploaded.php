<?php

namespace App\Events;

use App\Models\Asset;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;

class AssetUploaded
{
    use InteractsWithSockets, SerializesModels;

    public $asset;

    public function __construct(Asset $asset)
    {
        $this->asset = $asset;
    }

}
