<?php 
namespace App\Http\Controllers;

use Google\Service\Oauth2;
use Illuminate\Http\Request;
//use google\Client;
use Google_Client;

//use Google; 
//use Google\Auth\OAuth2;

class LoginController extends Controller
{
    //
    public function __invoke(){
        return view('login');
    }

    public function google(Request $request){
        echo "google";
        $code=$request->query('code');
        echo "The code is: ".$request->query('code');
        $client= $this->gClient();
        $token = $client->fetchAccessTokenWithAuthCode($code);
        echo "<br/><br/>";
        /*var_dump($token);
        echo "Clases disponibles en este contexto:\n";
        $clases_definidas = get_declared_classes();
        foreach ($clases_definidas as $clase) {
            echo "<br/><br/>".$clase;
        }
        die();*/
        if(!isset($token['error'])){
            /*echo "<br/> is not set";
            $directorio_actual = getcwd();
            echo "El directorio actual es: $directorio_actual";*/
            $client->setAccessToken($token['access_token']);
            $g = new Oauth2($client);
            $data = $g->userinfo->get();
            echo "The info of the user is: ";
            var_dump($data);
            echo "Email is: ".$data["email"]."<br/>";
            echo "Name is: ".$data["givenName"]."<br>";
            echo "Lastname is: ".$data["familyName"]."<br/>";

            //$g = new  google\Google_Service_Oauth2($client);
            //$google_service = new Google_Service_Oauth2($client);
            //$google_service = new google\Auth\OAuth2($client);
            //$google_service = new google\Auth\OAuth2();//05---------------->Access Token     06<---------------Protected Resource
            //$data = $google_service->userinfo->get();
            
        }

        //$class = get_class($client);
        //echo "<br/>the class is". $class;
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

        $client = new Google_Client();
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope("email");
        $client->addScope("profile");
        return $client;
    }

}
