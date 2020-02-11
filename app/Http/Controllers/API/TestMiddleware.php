<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class TestMiddleware extends Controller
{
    /**
     * Give Response
     */
    public function getResponse()
    {
        return response()->json(array('success'=> 200), 200);
    }
}
