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
            
            //getId

            /**********************************/
            

            
            /**********************************/

            foreach ($files->getFiles() as $file) {
                //$file=$file->getOwners();
                //echo "<br/><br/>file:";
                //var_dump($file);
                echo "<br/><br/>The id is: ".$file->getId()."<br/><br/>";
                
                $driveActivityService = new Google_Service_DriveActivity($client);
                
                //Google_Service_DriveActivity
                echo "<br/>The scope needed: ".Google_Service_DriveActivity::DRIVE_ACTIVITY_READONLY;
                die();
                // Retrieve activity events
                $request = new Google\Service\DriveActivity\QueryDriveActivityRequest([
                    // Add any parameters you want to include in the request
                    'itemName' => 'items/'.$file->getId(),
                ]);

                // Call the query method with the request object
                $response = $driveActivityService->activity->query($request);
                /*$response = $driveActivityService->activity->query([
                    'itemName' => 'items/'.$file->getId(),
                ]);*/

                foreach ($response->getActivities() as $activity) {
                    // Access activity information
                    $event = $activity->getPrimaryActionDetail();
                    echo 'User: ' . $event->getUser()->getKnownUser()->getPersonName() . "\n";
                    echo 'Action: ' . $event->getDocument()->getActionDetail()->getDocumentEditDetails()->getEditorIds()[0] . "\n";
                    echo 'Time: ' . $event->getTimestamp()->getSeconds() . "\n";
                    echo 'Type: ' . $event->getType() . "\n";
                    echo "\n";
                }
                echo "before die();";
                die();
                $methods = get_class_methods($file);
                foreach ($methods as $i => $m) {
                    echo "Method ".$i.": is: ".$m."<br/>";
                    # code...
                }
                die();
                //echo $file->getName() . "<br/><br/>";
            }
        }
        else{
            echo "no session set";
        }
    ?>

@endsection