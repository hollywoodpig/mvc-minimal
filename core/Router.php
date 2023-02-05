<?php
class Router
{
	/**
	 * Main route function
	 *
	 * @access private
	 * @param string $method HTTP method
	 * @param string $route URL path
	 * @param callable $callback Called if the request matches
	 */
	private static function route(string $method, string $route, callable $callback)
	{
		$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
		$currentMethod = $_SERVER['REQUEST_METHOD'];

		if ($currentMethod != $method) {
			return;
		}

		// Add leading and trailing slash
		$route = preg_replace('/^\/?([^\/]+(?:\/[^\/]+)*)\/?$/', '/$1/', $route);
		// Determine whether route has params
		$routeHasParams = preg_match('/{\w+}/', $route);

		// Route with params
		if ($routeHasParams) {
			$currentPathArray = explode('/', $currentPath);
			$routeArray = explode('/', $route);

			// Leave params only in route
			$routeParams = preg_grep('/{\w+}/', $routeArray);

			// Replace route params with current path values
			foreach ($routeParams as $index => $param) {
				$routeArray[$index] = $currentPathArray[$index] ?? null;
				$routeParams[$index] = $routeArray[$index] ?? null;
			}

			$currentPath = implode('/', $currentPathArray);
			$route = implode('/', $routeArray);

			if ($currentPath == $route) {
				$callback(...$routeParams);

				return;
			}

			return;
		}

		// Simple route
		if ($currentPath == $route) {
			$callback();

			return;
		}

		// Not found
		header('HTTP/1.0 404 Not Found');
	}

	/**
	 * Route wrapper for "GET" method.
	 *
	 * @param string $route URL path
	 * @param callable $callback Called if the request matches
	 */
	public static function get(string $route, callable $callback)
	{
		self::route('GET', $route, $callback);
	}

	/**
	 * Route wrapper for "POST" method.
	 *
	 * @param string $route URL path
	 * @param callable $callback Called if the request matches
	 */
	public static function post(string $route, callable $callback)
	{
		self::route('POST', $route, $callback);
	}
}
