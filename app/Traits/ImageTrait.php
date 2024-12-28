<?php

namespace App\Traits;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait ImageTrait
{
    protected static function bootImageTrait(): void
    {
        static::creating(function ($model) {
            $model->processImage();
        });

        static::updating(function ($model) {
            $model->processImage();
        });

        static::deleting(function ($model) {
            $model->deleteImage();
        });
    }

    protected function processImage(): void
    {
        $images = is_array($this->image) ? $this->image : [$this->image];
        foreach ($images as $imageData) {
            if ($this->isDirty('image') && !empty($imageData)) {
                $manager = new ImageManager(new Driver());

                $image = $manager->read($imageData);


                if ($this->width || $this->height) {
                    $image->resize($this->width, $this->height);
                }

                if ($this->watermark) {
                    $watermark = $manager->read(Storage::disk("images")->get("watermark.png"));
                    $image->place($watermark, 'center', 0, 0, 50);
                }

                $encoded = $image->toJpeg()->toDataUri();
                // $encoded = $image->encode('jpeg');
                $filename = $this->getFileName();

                $url = Storage::disk(config("filesystems.default"))->putFileAs($this->getTable(), $encoded, $filename);

                $this->updateImageAttributes($filename, $url);
            }
        }
    }

    public function deleteImage(): void
    {
        if (!empty($this->image)) {
            Storage::disk(config("filesystems.default"))->delete($this->getStoragePath($this->getOriginal('image')));
            $this->image = null;
            $this->image_url = null;
        }
    }

    protected function updateImageAttributes(string $filename, string $url): void
    {
        $this->image = $filename;

        if (config("filesystems.default") === "public") {
            $this->image_url = config("app.url") . "/storage/" . $url;
        } else {
            $this->image_url = $url;
        }
    }

    protected function getStoragePath(string $filename): string
    {
        return "{$this->getTable()}/{$filename}";
    }

    protected static function getFileName(): string
    {
        return Carbon::now()->timestamp . rand(1, 1000) . ".jpeg";
    }
}
