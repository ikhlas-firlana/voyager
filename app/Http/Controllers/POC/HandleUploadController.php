<?php

namespace App\Http\Controllers\POC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Validator;

/**
 * this controller will handle passport route
 * change from token into passport
 */
class HandleUploadController extends Controller
{
    public function show(Request $request) {
        return view('applications.dashboard.home');
    }

    /**
     * function upload file
     */
    public function post(Request $request) {
        // case 1
        $file = $request->file('a_file');
        Storage::put('public/avatars/1.png', $file);

        // case 2
        // $file = $request->a_file->storeAs('public/avatars', '1.png');
        
        // case 3
        // $file = $request->file('a_file');
        // Storage::disk('local')->put('public/avatars', $file, 'public');

        return back();
    }
}
