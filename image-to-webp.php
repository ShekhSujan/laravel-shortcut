<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageUploadController extends Controller
{
    function store(Request $request)
    {
        // Image convert to webp only support jpeg,png,jpg,webp
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);
        $image = $request->file("image");
        if ($image) {
            $ext = strtolower($image->getClientOriginalExtension());
            //Convert With PHP Function
            if ($ext == 'jpeg' || $ext == 'jpg') {
                $image = imagecreatefromjpeg($image);
            } elseif ($ext == 'png') {
                $image = imagecreatefrompng($image);
            } else {
                $image = imagecreatefromwebp($image);
            }

            $compress = 70; //Compress Image [1-100]
            $image = imagescale($image, 600, 300); //If you want to resize your image.
            imagewebp($image, "assets/images/" . 'image-name.webp', $compress);

            //Convert With Image Interventionn
            $compress = 70; //Compress Image [1-100]
            Image::make($image)->resize(600, 300)->encode('webp')->save("assets/images/" . 'image-name' . '.' . 'webp', $compress);
        }
    }
}
