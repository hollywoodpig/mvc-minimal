<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/AuthController.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/UserModel.php';

class UserController extends Controller
{
	public static function home()
	{
		$logged = AuthController::logged();
		$users = UserModel::getUsers();

		self::render('home', ['logged' => $logged, 'users' => $users]);
	}

	public static function userDetails(string $id)
	{
		$user = UserModel::getUser($id);

		if (empty($user)) {
			return self::redirect('/');
		}

		self::render('userDetails', ['user' => $user]);
	}

	public static function profile()
	{
		if (!AuthController::logged()) {
			return self::redirect('/');
		}

		$user = AuthController::getUser();

		self::render('profile', ['user' => $user]);
	}
}
