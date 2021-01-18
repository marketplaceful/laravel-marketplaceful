<?php

namespace Marketplaceful\Traits;

use Illuminate\Support\Facades\Storage;

trait HasPhotos
{
    public function getPhotoUrlsAttribute()
    {
        if (is_null($this->photo_paths)) {
            return [];
        }

        foreach ($this->photo_paths as $photo_path) {
            $photo_urls[] = Storage::disk($this->photoDisk())->url($photo_path);
        }

        return $photo_urls ?? [];
    }

    public function getPhotosForFilepondAttribute()
    {
        if (is_null($this->photo_paths)) {
            return [];
        }

        foreach ($this->photo_paths as $photo_path) {
            $photos[] = [
                'source' => $photo_path,
                'url' => Storage::disk($this->photoDisk())->url($photo_path),
                'origin' => 3,
            ];
        }

        return $photos ?? [];
    }

    public function updatePhotosFromFilepond($photos, $photoUploads)
    {
        tap(collect($this->photo_paths), function ($previous) use ($photos, $photoUploads) {
            $photoPaths = collect($photos)->map(function ($photo) use ($photoUploads) {
                if ($photo['origin'] === 3) {
                    return $photo['source'];
                }

                if ($upload = collect($photoUploads)->first(fn ($upload) => $upload->getFilename() === $photo['source'])) {
                    return $upload->storePublicly(
                        'listing-photos',
                        ['disk' => $this->featureImageDisk()]
                    );
                }

                return false;
            });

            $this->forceFill([
                'photo_paths' => $photoPaths->filter()->toArray(),
            ])->save();

            $previous->diff($photoPaths)->each(
                fn ($path) => Storage::disk($this->photoDisk())->delete($path)
            );
        });
    }

    protected function photoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
}
