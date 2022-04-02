<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function save($file, $folder, $maxWidth = false)
    {
        $folder = "public/images/$folder/" . date("Ym/d", time());
        $path = $file->store($folder);
        $validated['avatar'] = Storage::url($path);
        $extension = $file->extension();
        if ($maxWidth && $extension != 'gif') {
            $this->reduceSize(Storage::path($path), $maxWidth);
        }

        return Storage::url($path);;
    }

    public function reduceSize($filePath, $maxWidth)
    {
        $image = Image::make($filePath);
        $image->fit($maxWidth, null, function ($constraint) {
            $constraint->upsize();
        });
        $image->save();
    }
}
