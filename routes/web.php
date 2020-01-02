<?php

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

use Illuminate\Http\Request; 

Route::get('/', function(){
    $user = new App\User;
    $user->id = 1;
    $user->title = 'Test';

    return view('test.test', [
        'subscriptions' => [$user],
    ]);
});

Route::post('/register', function (Request $request) {
    $data = $request->all();
    $validator = \Validator::make($data, App\User::registrationRules($data));

    if($validator->fails()){
        return back()->withErrors($validator)->withInput();
    }
    dd('passed');
});
