<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogssiderController extends Controller
{
    public function add_blogsider(){
        $title = ' trang Blogsider';
        return view('clients.blogsider',compact('title'));
    }
}
