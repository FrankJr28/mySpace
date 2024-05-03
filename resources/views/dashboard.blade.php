@extends('layouts.template')

@section('title', 'Login')

@section('content')

    <h5>Dashboard</h5>
    <?php
        if(isset($_SESSION["access_token"])){
            echo "your access token is: ".$_SESSION["access_token"];
        }
        else{
            echo "no session set";
        }
    ?>

@endsection