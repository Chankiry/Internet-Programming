<?php
 namespace App\Http\Controllers;
 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Storage;
 use Intervention\Image\Facades\Image;
//  use Intervention\Image\ImageManagerStatic as Image;
 class UploadController extends Controller
 {

     public function upload(Request $request)
    {

        $request->validate([
                'document' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            ]);

            $image = $request->file('document');
            $fileName = uniqid() . '.' . $image->getClientOriginalExtension();

            Storage::disk('minio')->put(
                'uploads/' . $fileName,
                file_get_contents($image)
            );

            $thumbnail = Image::make($image->getRealPath())
                ->fit(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->encode();

            Storage::disk('minio')->put(
                'thumbnails/' . $fileName,
                (string) $thumbnail
            );

            return redirect('/upload_file')->with([
                'original_url' => Storage::disk('minio')->url('uploads/' . $fileName),
                'thumbnail_url' => Storage::disk('minio')->url('thumbnails/' . $fileName),
            ]);
    }
        
    
 }
