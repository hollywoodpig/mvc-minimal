<?php
class Controller
{
	/**
	 * Render function resulting to show a page from "views" folder.
	 *
	 * @access protected
	 * @param string $view The template name
	 * @param array $vars Variables, which should included into the template
	 */
	protected static function render(string $view, array $vars = [])
	{
		extract($vars);
		ob_start();

		include "$_SERVER[DOCUMENT_ROOT]/views/$view.phtml";

		echo ob_get_clean();
	}

	/**
	 * Redirect function. I think it's obvious what it does.
	 *
	 * @access protected
	 * @param string $url The url
	 * @param array $params "GET" parameters, which will be inserted into the url
	 */
	protected static function redirect(string $url, array $params = [])
	{
		if (empty($params)) {
			$newUrl = $url;
		} else {
			$newUrl = "$url?" . http_build_query($params);
		}

		header("Location: $newUrl");
		exit;
	}
}
