<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index(Request $request, $filename) {
        $path = "images/" . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return response(Storage::get($path), 200)
                ->header("Content-Type", Storage::mimeType($path));
    }
}
