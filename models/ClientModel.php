<?php
	require 'core/Model.php';

	class ClientModel extends Model {
		public function getClients() {
			return $this->query('select * from clients')->fetchAll();
		}

		public function getClient($id) {
			return $this->execute('select * from clients where id = :id', ['id' => $id])->fetch();
		}

		public function addClient($name) {
			return $this->execute('insert into clients (name) values (:name)', ['name' => $name]);
		}

		public function editClient($id, $name) {
			return $this->execute('update clients set name = :name where id = :id', ['name' => $name, 'id' => $id]);
		}

		public function deleteClient($id) {
			return $this->execute('delete from clients where id = :id', ['id' => $id]);
		}
	}
