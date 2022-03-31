<?php
	class Controller {
		protected function render($view, $vars = []) {
			extract($vars);
			ob_start();

			include $view;
			echo ob_get_clean();
		}

		protected function redirect($uri) {
			header("Location: $uri");
			exit;
		}
	}
