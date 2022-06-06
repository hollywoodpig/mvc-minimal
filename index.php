<?php
	require 'core/Router.php';
	require 'controllers/ClientController.php';

	/* == client == */

	$client = new ClientController();
	Router::get('/', [$client, 'home']);
	Router::get('/add', [$client, 'add']);
	Router::post('/add', [$client, 'doAdd']);
	Router::get('/edit', [$client, 'edit']);
	Router::post('/edit', [$client, 'doEdit']);
	Router::post('/delete', [$client, 'doDelete']);
