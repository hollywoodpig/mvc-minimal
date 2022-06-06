<?php
	require 'core/Controller.php';
	require 'models/ClientModel.php';

	class ClientController extends Controller {
		private $clientModel;

		public function __construct() {
			$this->clientModel = new ClientModel();
		}

		// home

		public function home() {
			$clients = $this->clientModel->getClients();

			return $this->render('views/client/home.php', ['clients' => $clients]);
		}

		// add

		public function add() {
			return $this->render('views/client/add.php');
		}

		public function doAdd() {
			$name = $_POST['name'];

			$this->clientModel->addClient($name);
			return $this->redirect('/');
		}

		// edit

		public function edit() {
			$id = $_GET['id'];

			if (!isset($id)) {
				return $this->redirect('/');
			}

			$client = $this->clientModel->getClient($id);

			if (empty($client)) {
				return $this->redirect('/');
			}

			return $this->render('views/client/edit.php', ['client' => $client]);
		}

		public function doEdit() {
			$id = $_POST['id'];
			$name = $_POST['name'];

			if (!isset($id) || !isset($name)) {
				return $this->redirect('/');
			}

			$this->clientModel->editClient($id, $name);
			return $this->redirect('/');
		}

		// delete

		public function doDelete() {
			$id = $_POST['id'];

			$this->clientModel->deleteClient($id);
			return $this->redirect('/');
		}
	}
