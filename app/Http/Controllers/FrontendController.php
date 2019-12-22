<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
   function arif(){
       return view('arif');
   }

   function contact(){
    return view('contact');
}
}
