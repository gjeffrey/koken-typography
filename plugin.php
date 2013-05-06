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

		//ignore php-typo on this class. you can add noTypo class to your elements for avoiding typography modifications
		$typo->set_classes_to_ignore("vcard", "noTypo");

		//words with more than (x) letters can be alone on a new line
		$typo->set_max_dewidow_length(10);

		// French typography options
		$typo->set_smart_quotes_primary("doubleGuillemetsFrench");
		$typo->set_smart_quotes_secondary("doubleCurled");

		// uncomment line below for disabling non-breaking space before punctuation (french)
		//$typo->set_punctuation_spacing(FALSE);

		//delete the line below if you want hyphenation in your texts
		$typo->set_hyphenation(FALSE);
		// uncomment lines below for activate french hyphenation. Works if set_hyphenation is true
		// $typo->set_hyphenation_language("fr");
		// $typo->set_hyphenate_all_caps(FALSE);

		// avoid the addition of diacritics on non diacritics french words
		$typo->set_smart_diacritics(FALSE); 
		
		// avoid slashes converted in divide sign in dates like 04/05/13
		$typo->set_smart_math(FALSE);

		//Process input text with option
		$html = $typo->process($html);
		return $html;
	}
}
