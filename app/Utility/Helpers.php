<?php

namespace App\Utility;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class Helpers
{
    //Uploads image and convert to png
    public static function upload(string $dir, $image = null): string
    {
        if ($image && $image->isValid()) {
            $originalExtension = $image->getClientOriginalExtension();
            $format = 'png';

            if ($originalExtension !== 'png') {
                $img = Image::make($image)->encode($format);
            } else {
                $format = $originalExtension;
                $img = Image::make($image);
            }

            $imageName = Carbon::now()->toDateString().'-'.uniqid().'.'.$format;

            if (! Storage::disk('public')->exists($dir)) {
                Storage::disk('public')->makeDirectory($dir);
            }

            if ($img) {
                Storage::disk('public')->put($dir.$imageName, $img->stream());
            } else {
                return 'error.png';
            }

            return $imageName;
        } else {
            return 'error.png';
        }
    }

    public static function update(string $dir, $old_image, $image = null): string
    {
        if (Storage::disk('public')->exists($dir . $old_image)) {
            Storage::disk('public')->delete($dir . $old_image);
        }
        return Helpers::upload($dir, $image);
    }


    public static function generateUniqueSlug($slug)
    {
        $counter = 1;
        $suggestedSlug = $slug;

        while (Product::where('slug', $suggestedSlug)->exists()) {
            $counter++;
            $suggestedSlug = $slug . '-' . $counter;
        }

        return $suggestedSlug;
    }

}
