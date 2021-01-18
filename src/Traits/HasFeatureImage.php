<?php

namespace Marketplaceful\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HasFeatureImage
{
    public function updateFeatureImage(UploadedFile $image)
    {
        tap($this->feature_image_path, function ($previous) use ($image) {
            $this->forceFill([
                'feature_image_path' => $image->storePublicly(
                    'feature-images',
                    ['disk' => $this->featureImageDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->featureImageDisk())->delete($previous);
            }
        });
    }

    public function getFeatureImageUrlAttribute()
    {
        return $this->feature_image_path
                    ? Storage::disk($this->featureImageDisk())->url($this->feature_image_path)
                    : $this->defaultFeatureImageUrl();
    }

    protected function defaultFeatureImageUrl()
    {
        return 'https://ui-avatars.com/api/?name=&color=7F9CF5&background=EBF4FF';
    }

    protected function featureImageDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }
}
