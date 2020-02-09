<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;

class CustomPageController extends Controller
{
    /**
     * Show Custom page controller
     */
    public function gravy()
    {
        return view('/vendor/voyager/gravy');
    }
}
