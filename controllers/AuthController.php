<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Controller.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php';

class AuthController extends Controller
{
	public static function __constructStatic()
	{
		session_start();
	}

	/* == utils == */

	public static function logged(): bool
	{
		if (empty($_SESSION['user'])) {
			return false;
		}

		return true;
	}

	public static function getUser(): array
	{
		if (empty($_SESSION['user'])) {
			return [];
		}

		return $_SESSION['user'];
	}

	/* == register == */

	public static function register()
	{
		if (self::logged()) {
			return self::redirect('/profile');
		}

		self::render('auth/register');
	}

	public static function doRegister()
	{
		$name = $_POST['name'];
		$password = $_POST['password'];
		$repeatPassword = $_POST['repeat-password'];
		$bio = $_POST['bio'];

		if (empty($name) || empty($password) || empty($repeatPassword) || empty($bio)) {
			return self::redirect('/register', ['message' => 'You didn\'t fill all fields.']);
		}

		if ($password !== $repeatPassword) {
			return self::redirect('/register', ['message' => 'Passwords don\'t match.']);
		}

		AuthModel::register($name, md5($password), $bio);

		return self::redirect('/login');
	}

	/* == login == */

	public static function login()
	{
		if (self::logged()) {
			return self::redirect('/profile');
		}

		self::render('auth/login');
	}

	public static function doLogin()
	{
		$name = $_POST['name'];
		$password = $_POST['password'];

		if (empty($name) || empty($password)) {
			return self::redirect('/login', ['message' => 'You didn\'t fill all fields.']);
		}

		$user = AuthModel::login($name);

		if (empty($user)) {
			return self::redirect('/login', ['message' => 'This user doesn\'t exist.']);
		}

		if (md5($password) !== $user['password']) {
			return self::redirect('/login', ['message' => 'Wrong password.']);
		}

		$_SESSION['user'] = $user;

		return self::redirect('/profile');
	}

	/* == logout == */

	public static function logout()
	{
		unset($_SESSION['user']);

		return self::redirect('/');
	}
}

AuthController::__constructStatic();
