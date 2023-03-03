<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function save($file, $folder, $maxWidth = false, $cut = true)
    {
        $folder = "public/images/$folder/" . date("Ym/d", time());
        $path = $file->store($folder);
        $extension = $file->extension();
        if ($maxWidth && $extension != 'gif') {
            $this->reduceSize(Storage::path($path), $maxWidth, $cut);
        }

        return Storage::url($path);;
    }

    public function reduceSize($filePath, $maxWidth, $cut)
    {
        $image = Image::make($filePath);
        if ($cut) {
            $image->fit($maxWidth, null, function ($constraint) {
                $constraint->upsize();
            });
        } else {
            $image->resize($maxWidth, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }
        $image->save();
    }
}
