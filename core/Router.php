<?php
class Router
{
	/**
	 * Main route function. By the way, you can't use it outside the class.
	 *
	 * @access private
	 * @param string $method HTTP method
	 * @param string $route URL path
	 * @param callable $callback Controller's method, which will be called if the url matches
	 */
	private static function route(string $method, string $route, callable $callback)
	{
		$routeArray = explode('/', $route);
		$routeParams = preg_grep('/:\w+/', $routeArray);
		$routeParsed = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

		if (empty($routeParams)) {
			if ($method === $_SERVER['REQUEST_METHOD'] && $route === $routeParsed) {
				$callback();
			}
			return;
		}

		$uriArray = explode('/', $routeParsed);
		foreach ($routeParams as $index => $param) {
			$routeArray[$index] = $uriArray[$index] ?? null;
			$routeParams[$index] = $routeArray[$index] ?? null;
		}

		$uriStr = implode('/', $uriArray);
		$routeStr = implode('/', $routeArray);
		if ($method === $_SERVER['REQUEST_METHOD'] && $uriStr === $routeStr) {
			return $callback(...$routeParams);
		}

		return header('HTTP/1.0 404 Not Found');
	}

	/**
	 * Route function wrapper for "GET" method.
	 *
	 * @param string $route URL path
	 * @param callable $callback Controller's method, which will be called if the url matches
	 */
	public static function get(string $route, callable $callback): void
	{
		self::route('GET', $route, $callback);
	}

	/**
	 * Route function wrapper for "POST" method.
	 *
	 * @param string $route URL path
	 * @param callable $callback Controller's method, which will be called if the url matches
	 */
	public static function post(string $route, callable $callback): void
	{
		self::route('POST', $route, $callback);
	}
}
