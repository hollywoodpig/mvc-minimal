<?php
	require 'core/Router.php';
	require 'controllers/ClientController.php';

	// == client ==

	$client = new ClientController();

	// home

	Router::route('/', 'GET', [$client, 'home']);

	// add

	Router::route('/add', 'GET', [$client, 'add']);
	Router::route('/doAdd', 'POST', [$client, 'doAdd']);

	// edit

	Router::route('/edit', 'GET', [$client, 'edit']);
	Router::route('/doEdit', 'POST', [$client, 'doEdit']);

	// delete

	Router::route('/doDelete', 'POST', [$client, 'doDelete']);
