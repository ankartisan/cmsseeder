<?php

namespace App\Listeners;

use App\Models\Config;

class ResizeUploadedAsset
{
    /**
     * Handle the event.
     *
     * @param  $event
     * @return void
     */
    public function handle($event)
    {
        $asset = $event->asset;

        if($asset->is_image && Config::getByName('image_sizes')) {
            $asset->resize();
        }
    }
}
