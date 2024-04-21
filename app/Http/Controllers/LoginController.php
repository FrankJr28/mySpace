<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function __invoke(){
        return view('login');
    }

    public function google(Request $request){
        //compact($uri);
        echo "here is google";
        var_dump($request);
    }

    public function hello(){
        return view('hello');
    }

}
