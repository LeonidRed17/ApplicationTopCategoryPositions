<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopCategoryController extends Controller
{
    public function getAppTop(Request $request)
    {
        $date = $request->query('date');

        return view('test', ['date' => $date]);
    }
}
