<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class tour_detailController extends Controller
{
    public function index(){
        $title ="Tour-detail";
        return view('clients.tour-detail',compact('title'));
    }
}
