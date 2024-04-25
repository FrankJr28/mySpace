<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google; 

class LoginController extends Controller
{
    //
    public function __invoke(){
        return view('login');
    }

    public function google(Request $request){
        echo "google";
        echo "The code is: ".$request->query('code');
        $client= $this->gClient();
        $class = get_class($client);
        echo "<br/>the class is". $class;
        //compact($uri);
        /*echo "here is google";
        var_dump($request);*/
    }

    public function hello(){
        return view('hello');
    }

    public function gClient(){
        $clientID = env('CLIENT_ID');
        $clientSecret = env('CLIENT_SECRET');
        $redirectUri = 'http://localhost:8000/google_credentials';
        
        // create Client Request to access Google API 

        $client = new google\Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");
        return $client;
    }

}
