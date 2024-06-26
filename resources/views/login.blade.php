@extends('layouts.template')

@section('title', 'Login')

@section('content')
    <?php
    //$appId = env('CLIENT_ID');
    //echo "The app id is: ".$appId;
    //$client = new Google_Client();
    
    // init configuration 
    //echo "after setup google client";
    ?>
    <div class="container rounded bg-white" style="border-radius: 20px !important;">
        <div class="row mt-3">
            <div class="col-sm-0 col-md-7">
                <img src="img/files.jpg" class="w-100" alt="">
            </div>
            <div class="col-sm-12 col-md-5 d-flex justify-content-center flex-column">
                <p>Welcome!</p>
                <p>This applications allows you see more of your drive</p>
                <a href="{{$client->createAuthUrl() }}" class="btn btn-primary w-100" style="height: min-content">
                    <i class="fa-brands fa-google"></i>
                    Login with google
                </a> 
            </div>
        </div>
    </div>
    
@endsection