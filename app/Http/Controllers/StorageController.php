<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\ErrorHandler\Debug;

use function PHPUnit\Framework\isArray;
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
        $requestFolder = $request->query('folder'); //needs validation

        Log::debug("requestFolder " . gettype($requestFolder) . ' ' . json_encode($requestFolder));

        if (is_string($requestFolder)) {
            $foldernames = array($requestFolder);
        } else $foldernames = $requestFolder;

        Log::debug("foldernames " . gettype($foldernames) . ' ' . json_encode($foldernames));

        $result = [];
        foreach ($foldernames as $foldername) {
            $path = "images/" . $foldername; // check if exists
            // if (!Storage::directoryExists($path)) {
            //     abort(404);
            // }

            $images = Storage::disk('public')->files($path);
            if (!$images) abort(404);

            $gallery = [];
            foreach ($images as $image) {
                $gallery[] = Storage::url($image);
            }

            $result[$foldername] = $gallery;
        }

        return response($result, 200)->header("Content-Type", 'application/json');
    }
}
