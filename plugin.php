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
		// French typography options
		$typo->set_smart_quotes_primary("doubleGuillemetsFrench");
		$typo->set_smart_quotes_secondary("doubleCurled");
		// uncomment line below for disabling non-breaking space before punctuation (french)
		//$typo->set_punctuation_spacing(FALSE);

		//disable hyphenation
		$typo->set_hyphenation(FALSE);
		// uncomment lines below for activate french hyphenation if set_hyphenation is true
		// $typo->set_hyphenation_language("fr");
		// $typo->set_hyphenate_all_caps(FALSE);

		$typo->set_smart_diacritics(FALSE); // avoid the addition of diacritics on non diacritics french words
		$typo->set_smart_math(FALSE); // avoid slashes converted in divide sign in dates like 04/05/2013

		//Process inût text with option
		$html = $typo->process($html);
		return $html;
	}
}



