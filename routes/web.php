<?php

//require_once 'google-api-php-client/autoload.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', LoginController::class);

Route::get('hello', [LoginController::class, 'hello']);

Route::get('/google_credentials', [LoginController::class, 'google']);

/*Route::get('google_credentials/{uri}', [LoginController::class, 'google']);*/

/*Route::match(['get', 'post'], '/google_credentials', function (Request $request) {
    // Retrieve query string parameters
    $code = $request->query('code');
    $scope = $request->query('scope');
    $authuser = $request->query('authuser');
    $hd = $request->query('hd');
    $prompt = $request->query('prompt');
});*/

/*Route::get('/google_credentials', function (Request $request) {
    // Retrieve query string parameters
    
    /*$code = $request->query()['code'];
    $scope = $request->query()['scope'];
    $authuser = $request->query()['authuser'];
    $hd = $request->query()['hd'];
    $prompt = $request->query()['prompt'];*/
    //var_dump($request);
    /*echo "<br/>hola credentials";
    echo "<br/>code: ".$request->query('code');*/
    //echo "code is: ".$code." scope: ".$scope." authuser: ".$authuser." hd: ".$hd." prompt: ".$prompt;
    
    //var_dump($request->query()["code"]);
    
    //echo "<br/>code is:".$code;

    //echo "<br/>scope is:".$scope;

    // Do something with the parameters
    // For example, return a response or redirect
//});

//Route::get('google_credentials', [LoginController::class, 'google']);
/***********************************************************/
//Route::get('/google_credentials', [LoginController::class, 'google']);
/***********************************************************/
//Route::get('/google_credentials', [LoginController::class, 'google'])->name("login.google");