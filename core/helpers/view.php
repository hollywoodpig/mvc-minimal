<?php

/**
 * Render view without a controller method.
 *
 * @param string $view Template name
 */
function view(string $view)
{
	include "$_SERVER[DOCUMENT_ROOT]/views/$view.phtml";
}
