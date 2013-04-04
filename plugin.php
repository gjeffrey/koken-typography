<?php
class GJTypography extends KokenPlugin {
	function __construct()
	{
		$this->register_filter('site.output', 'typography');
	}

	function typography($html)
	{
		include('php-typography.php');
		$typo = new phpTypography();
		$html = $typo->process($html);
		
		return $html;
	}
}



