<?php
	class Model {
		protected $db;

		public function __construct() {
			require 'config/config.php';

			$host = $config['host'];
			$db = $config['db'];
			$user = $config['user'];
			$password = $config['password'];

			try {
				$this->db = new PDO("mysql:host=$config[host];dbname=$config[db]", "$config[user]", "$config[password]", [
					PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
				]);
			} catch (PDOException $e) {
				echo $e;
			}
		}

		protected function fetch() {
			return $this->fetch();
		}

		protected function fetchAll() {
			return $this->fetchAll();
		}

		protected function query($query) {
			return $this->db->query($query);
		}

		protected function execute($query, $args = []) {
			$stmt = $this->db->prepare($query);
			$stmt->execute($args);

			return $stmt;
		}
	}
