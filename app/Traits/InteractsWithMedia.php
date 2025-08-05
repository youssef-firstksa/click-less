<?php

namespace App\Traits;

use Spatie\MediaLibrary\InteractsWithMedia as SpatieInteractsWithMedia;

trait InteractsWithMedia
{
    use SpatieInteractsWithMedia;

    public function getFirstMediaUrlSafe(string $collectionName = 'default', string $conversionName = ''): string
    {
        $mediaItem = $this->getFirstMedia($collectionName);

        if (file_exists($mediaItem?->getPath($conversionName))) {
            $media = $mediaItem->getUrl($conversionName);
        } else {
            $media =  asset('assets/dashboard/images/user-list/user-list1.png');
        }

        return $media;
    }

    public function hasMedia(string $collectionName = 'default', string $conversionName = ''): bool
    {
        $mediaItem = $this->getFirstMedia($collectionName);
        return file_exists($mediaItem?->getPath($conversionName));
    }
}
