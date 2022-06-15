<?php

/**
 * Render view directly without creating a controller method.
 *
 * @param string $view Template name
 * @return void
 */
function view(string $view): void
{
	include "$_SERVER[DOCUMENT_ROOT]/views/$view.phtml";
}
