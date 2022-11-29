<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        return $this->sendResponse([
            'url' => '/images/'.$imageName,
        ], 'Image uploaded successfully.');
    }
}
