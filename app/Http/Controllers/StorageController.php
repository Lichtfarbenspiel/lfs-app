<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

use function PHPUnit\Framework\isNull;

class StorageController extends Controller
{
    public function index(Request $request, $filename)
    {
        $path = "images/" . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        $image = Storage::url(Storage::get($path));


        return response($image, 200)
            ->header("Content-Type", Storage::mimeType($image));
    }

    public function GetGallery(Request $request)
    {
        $foldername = $request->query('folder');

        $path = "images/" . $foldername;
        // if (!Storage::directoryExists($path)) {
        //     abort(404);
        // }
        
        $images = Storage::disk('public')->files($path);
        if (!$images) abort(404);

        $result = [];
        foreach($images as $image) {
            $result[] = Storage::url($image);
        }

        return response($result, 200)->header("Content-Type", 'application/json');
    }

}
