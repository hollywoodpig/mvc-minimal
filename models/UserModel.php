<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/core/Model.php';

class UserModel extends Model
{
	public static function getUsers()
	{
		return self::execute('select * from users')->fetchAll();
	}

	public static function getUser(string $id)
	{
		return self::execute('select * from users where id = :id', ['id' => $id])->fetch();
	}
}
