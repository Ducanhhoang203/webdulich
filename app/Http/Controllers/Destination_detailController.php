<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Destination_detailController extends Controller
{
  public function index(){
    $title ="Destinal-detail";
    return view('clients.blocks.destination-detail',compact('title'));
  }
}
