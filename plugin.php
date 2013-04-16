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
		
		// FR from Julien Dubedout
		$typo->set_hyphenation_language("fr-FR");
		$typo->set_hyphenate_all_caps(FALSE);
		$typo->set_smart_quotes_primary("doubleGuillemetsFrench");
		$typo->set_smart_quotes_secondary("doubleCurled");
		$typo->set_smart_diacritics(FALSE);
		$typo->set_smart_math(FALSE);
		// end FR
		
		$html = $typo->process($html);
		
		return $html;
	}
}



