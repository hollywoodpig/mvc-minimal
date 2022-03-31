<?php
	class Router {
		public static function route($uri, $method, $callback) {
			$uriMatches = strtok($_SERVER['REQUEST_URI'], '?') == $uri;
			$methodMatches = $_SERVER['REQUEST_METHOD'] == $method;

			if ($uriMatches && $methodMatches) {
				return $callback();
			}

			return http_response_code(404);
		}
	}
