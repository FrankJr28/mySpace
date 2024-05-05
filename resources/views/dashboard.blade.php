@extends('layouts.template')

@section('title', 'Login')

@section('content')

    <h5>Dashboard</h5>
    <?php
        if(isset($_SESSION["access_token"])){
            echo "your access token is: ".$_SESSION["access_token"];
            //$driveService = new Google\Service\Drive($client);
            $client = app('MyGoogleClient');
            //$retrievedToken = $client->getAccessToken();
            //var_dump($retrievedToken);
            //echo "<br/><br/>The retrieved token is: ".$retrievedToken;
            $client->setAccessToken($_SESSION["access_token"]);
            //$retrievedToken = $client->getAccessToken();
            //echo "<br/><br/>The retrieved token is: ".$client->getAccessToken()["access_token"];
            /************************************************************************************/
            $driveService = new Google\Service\Drive($client);

            $files = $driveService->files->listFiles(['q' => "'root' in parents"]);

            foreach ($files->getFiles() as $file) {
                echo $file->getName() . "<br/><br/>";
            }
        }
        else{
            echo "no session set";
        }
    ?>

@endsection