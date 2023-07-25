<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * Store a newly created image in storage.
     * 
     * Validates that the image is not empty before processing
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'img' => 'required'
        ]);

        //get the img file from request and store it in public/alcohol_images
        $file = $request->file('img');
        $fileName = $file->getClientOriginalName();
        $destinationPath = public_path().'/alcohol_images';
        $file->move($destinationPath,$fileName);

        //the alcohol img will be stored in this format '/alcohol_images/img.jpg'
        $img_URL = 'alcohol_images/'.$fileName;

        $Image = new Image();
        $Image->userId = $request->userId;
        $Image->itemId = $request->itemId;
        $Image->URL = $img_URL;
        $Image->save();

        return redirect()->action([ItemController::class, 'show'], ['item' => $request->itemId]);
    }
}