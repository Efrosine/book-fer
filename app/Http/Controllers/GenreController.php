<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return response()->json([['horror', 'comedy', 'drama', 'action', 'others']]);
    }
}
