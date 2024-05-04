<?php 
namespace App\Http\Controllers;

use App\Models\User;
use Google\Service\Oauth2;
use Illuminate\Http\Request;
//use google\Client;
//Google\Service\Drive
use Google\Service\Drive;
use Google_Client;
//use App\Providers\MyGoogleClient;
//use Google\Service\Appsactivity;

//use Google; 
//use Google\Auth\OAuth2;

class LoginController extends Controller
{
    //
    public function __invoke(){
        /*
        $dependencyObject = app('dependencyObject');
        return view('your.view', ['dependencyObject' => $dependencyObject]);
        */
        
        $clientID = env('CLIENT_ID');
        $clientSecret = env('CLIENT_SECRET');
        $redirectUri = 'http://localhost:8000/google_credentials';
        
        // create Client Request to access Google API 
        //$client = new Google_Client();
        $client = app('MyGoogleClient');
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        //Google\Service\Drive;
        $client->addScope(Drive::DRIVE_METADATA_READONLY);
        $client->addScope("email");
        $client->addScope("profile");
        $client->setAccessType("offline");
        $client->setApprovalPrompt("force"); 
        return view('login', ['client' => $client]);
    }

    public function create(Request $request){
        
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        session_start();
        $user->refresh_token = $_SESSION["refresh_token"];
        $user->ip=$_SERVER['REMOTE_ADDR'];
        $user->save();
        echo "saved";
    
    }

    public function google(Request $request){
        if($request->query('code')){
            $code=$request->query('code');
            $client= $this->gClient();
            $token = $client->fetchAccessTokenWithAuthCode($code);
            if(!isset($token['error'])){
                session_start();
                $_SESSION["access_token"]=$token["access_token"];
                $_SESSION["refresh_token"]=$token["refresh_token"];
                $client->setAccessToken($token['access_token']);
                $g = new Oauth2($client);
                $data = $g->userinfo->get();

                $user = new User();
                $exists=$user->where('email', $data["email"])->first();
                if($exists){
                    //update lastlogin
                    return redirect('/dashboard');
                    
                }
                else{
                    return view('loginForm')->with('data', $data);
                }
                
            }
            else{
                return view('login'); 
            }
        }
        else{
            return view('login'); 
        }
    }

    public function hello(){
        return view('hello');
    }

    public function gClient(){
        $clientID = env('CLIENT_ID');
        $clientSecret = env('CLIENT_SECRET');
        $redirectUri = 'http://localhost:8000/google_credentials';
        //$dependencyObject = app('dependencyObject');
        $client = app('MyGoogleClient');
        $client->setClientId($clientID);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope(Drive::DRIVE_METADATA_READONLY);
        $client->addScope("email");
        $client->addScope("profile");
        $client->setAccessType("offline");
        $client->setApprovalPrompt("force"); 
        return $client;
    }

}
