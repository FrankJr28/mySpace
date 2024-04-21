@extends('layouts.template')

@section('title', 'Login')

@section('content')
    <h2>You are in login</h2>
    <?php
    //$appId = env('CLIENT_ID');
    //echo "The app id is: ".$appId;
    //$client = new Google_Client();
    
    // init configuration 
    $clientID = env('CLIENT_ID');
    $clientSecret = env('CLIENT_SECRET');
    $redirectUri = 'http://localhost:8000/google_credentials';
    
    // create Client Request to access Google API 
    $client = new Google_Client();
    $client->setClientId($clientID);
    $client->setClientSecret($clientSecret);
    $client->setRedirectUri($redirectUri);
    $client->addScope("email");
    $client->addScope("profile");
 
    
    echo "after setup google client";
    echo "<a href='".$client->createAuthUrl()."'>Google Login</a>";

    ?>
@endsection