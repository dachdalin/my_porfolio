<?php

namespace App\helpers;

use Carbon\Carbon;
class ImageHelper{
    public static function upload(string $dir, $image = null)
    {
        try {
            if ($image != null) {
                $extension = $image->getClientOriginalExtension();
                if ($extension == "" || $extension == null) $extension = 'png';
                $imageName = Carbon::now()->toDateString() . "-" . uniqid() . "." . $extension;
                $image->move(public_path($dir), $imageName);
            } else {
                $imageName = null;
            }

        return $imageName;
        } catch (\Exception $e) {
            
            return $e->getMessage();
        }
    }

    public static function update(string $dir, $old_image, $image = null)
    {
        if ($old_image) {
            $old_image_name = str_replace(asset($dir), '', $old_image);
            if (file_exists($dir .'/'. $old_image_name)) {
                unlink($dir .'/'. $old_image_name);
            }
        }

        $imageName = ImageHelper::upload($dir, $image);
        return $imageName;
    }
    public static function delete($full_path)
    {

        if (file_exists($full_path)) {
            unlink($full_path);
        }

    }
}


