<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Desnation2Controller extends Controller
{

    public function index(){
        $title = "Destination2";
        return view('clients.destination2',compact('title'));
    }
}
