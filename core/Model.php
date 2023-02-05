<?php
class Model
{
	/**
	 * Instance of PDO class.
	 */
	private static $db = null;

	/**
	 * Method which sets up the database.
	 *
	 */
	public static function __constructStatic()
	{
		if (!is_dir('database')) {
			mkdir('database', 0777, true);
		}

		self::$db = new PDO("sqlite:$_SERVER[DOCUMENT_ROOT]/database/database.sqlite");

		self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	/**
	 * Read database query.
	 *
	 * @access protected
	 * @param string $query SQL query
	 * @return object Output result
	 */
	protected static function query(string $query): object
	{
		return self::$db->query($query);
	}

	/**
	 * Execute database query with variable.
	 *
	 * @access protected
	 * @param string $query SQL query
	 * @param array $vars Query variables
	 * @return object Output result
	 */
	protected static function execute(string $query, array $vars = []): object
	{
		$stmt = self::$db->prepare($query);
		$stmt->execute($vars);

		return $stmt;
	}
}

Model::__constructStatic();
