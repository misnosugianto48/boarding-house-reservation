<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    public function find()
    {
        return view('pages.boarding-houses.find');
    }
}
