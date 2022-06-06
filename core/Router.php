<?php
	class Router {
		public static function route($url, $method, $callback) {
			$urlMatches = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) == $url;
			$methodMatches = $_SERVER['REQUEST_METHOD'] == $method;

			if ($urlMatches && $methodMatches) {
				return $callback();
			}

			return http_response_code(404);
		}

		public static function get($url, $callback) {
			self::route($url, 'GET', $callback);
		}

		public static function post($url, $callback) {
			self::route($url, 'POST', $callback);
		}

		public static function put($url, $callback) {
			self::route($url, 'PUT', $callback);
		}

		public static function delete($url, $callback) {
			self::route($url, 'DELETE', $callback);
		}
	}
