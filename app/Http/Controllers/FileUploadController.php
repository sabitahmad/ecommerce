<?php

namespace App\Http\Controllers;

use App\Utility\Helpers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function thumbnailUpload(Request $request)
    {
        $request->validate([
            'thumbnail' => ['required', 'image']
        ]);
        if ($request->hasFile('thumbnail')) {
            return Helpers::upload('products/thumbnails/', $request->file('thumbnail'));
        } else {
            return '';
        }

    }

    public function thumbnailRestore(Request $request)
    {

        $thumbPath = 'products/thumbnails/'. $request->query('restore');

        if (Storage::disk('public')->exists($thumbPath)) {

            $thumbContent = Storage::disk('public')->get($thumbPath);
            $mimeType =  Storage::disk('public')->mimeType($thumbPath);

            return response($thumbContent)->header('Content-Type', $mimeType)->header('Content-Disposition', 'inline; filename="' .  $request->query('restore') . '"');

        }

        abort(404, 'File not found');

    }

    public function thumbnailRevert(Request $request)
    {

        if (Storage::disk('public')->exists('products/thumbnails/' . $request->getContent())) {
            Storage::disk('public')->delete('products/thumbnails/' . $request->getContent());
        }
    }

    public function productImageUpload(Request $request)
    {
        $request->validate([
            'product_images.*' => ['required', 'image']
        ]);
        $imageNames = [];
        foreach ($request->file('product_images') as $image) {

            $name = Helpers::upload('products/',  $image);
            $imageNames[] = $name;
        }

        return json_encode($imageNames);
    }


    public function  productImageRevert(Request $request)
    {

        foreach (json_decode($request->getContent()) as $image) {
            if (Storage::disk('public')->exists('products/' . $image)) {
                Storage::disk('public')->delete('products/' . $image);

            }
        }
    }

    public function productImageRestore(Request $request)
    {


        if (is_array($request->query('restore'))) {
            foreach (json_decode($request->query('restore')) as $imageName) {
                $thumbPath = 'products/'. $imageName;

                if (Storage::disk('public')->exists($thumbPath)) {

                    $thumbContent = Storage::disk('public')->get($thumbPath);
                    $mimeType =  Storage::disk('public')->mimeType($thumbPath);

                    return response($thumbContent)->header('Content-Type', $mimeType)->header('Content-Disposition', 'inline; filename="' .  $imageName . '"');

                }
            }
        } else {
            $thumbPath = 'products/'. $request->query('restore');
            if (Storage::disk('public')->exists($thumbPath)) {

                $thumbContent = Storage::disk('public')->get($thumbPath);
                $mimeType =  Storage::disk('public')->mimeType($thumbPath);

                return response($thumbContent)->header('Content-Type', $mimeType)->header('Content-Disposition', 'inline; filename="' .  $request->query('restore') . '"');

            }
        }



        abort(404, 'File not found');

    }
}
