<?php

require_once 'config.php';

$Router = new App\Route\Router;

if(!isset($_SESSION['login'])){
    $Router::get('/*', 'App\Controllers\AuthenticationController@signIn');
}

$Router::get('/home', 'App\Controllers\Site@home');
$Router::get('/profile', 'App\Controllers\Site@profile');
$Router::get('/users', 'App\Controllers\Site@users');
$Router::get('/groups', 'App\Controllers\ChatController@groups');
$Router::get('/new-group', 'App\Controllers\ChatController@newGroup');
$Router::get('/talk/(:num)', 'App\Controllers\ChatController@talk');
$Router::get('/group/(:num)', 'App\Controllers\ChatController@group');
$Router::get('/login', 'App\Controllers\AuthenticationController@signIn');
$Router::get('/register', 'App\Controllers\AuthenticationController@signUp');
$Router::get('/accept-friend', 'App\Controllers\FriendsController@acceptFriend');
$Router::get('/exception-treatament', 'App\Controllers\Site@hackerTreatment');

$Router::post('/login', 'App\Controllers\AuthenticationController@signInAuth');
$Router::post('/register', 'App\Controllers\AuthenticationController@signUpAuth');
$Router::get('/new-message', 'App\Controllers\ChatController@createMessage');
$Router::post('/add-friend', 'App\Controllers\FriendsController@requestNewFriend');
$Router::post('/users', 'App\Controllers\Site@users');
$Router::post('/groups', 'App\Controllers\ChatController@groups');
$Router::post('/new-group', 'App\Controllers\ChatController@requestNewGroup');
$Router::post('/participate-group', 'App\Controllers\ChatController@requestParticipateGroup');
$Router::post('/update-account', 'App\Controllers\AuthenticationController@updateAccount');


$Router::dispatch();


?>