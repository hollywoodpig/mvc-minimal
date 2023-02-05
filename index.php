<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Router.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/helpers/view.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/AuthController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/UserController.php';

/* == auth == */

Router::get('/register/', function () {
	AuthController::register();
});

Router::post('/register/', function () {
	AuthController::doRegister();
});

Router::get('/login/', function () {
	AuthController::login();
});

Router::post('/login/', function () {
	AuthController::doLogin();
});

Router::get('/logout/', function () {
	AuthController::logout();
});

/* == user == */

Router::get('/', function () {
	UserController::home();
});

Router::get('/user/{id}/', function ($id) {
	UserController::userDetails($id);
});

Router::get('/profile/', function () {
	UserController::profile();
});

/* == common == */

Router::get('/about/', function () {
	view('about');
});
