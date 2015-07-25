<?php

/**
 * Description of GenericFunctions
 *
 * @author chrisp
 */
class GenericFunctions {

	function generateCodeListing($filesToPrint) {
		if (is_array($filesToPrint) && count($filesToPrint)>0) {
			$out = "<hr style='clear:both'/><ul><a name='fileTop'>";
			foreach ($filesToPrint as $key => $value) {
				$out .= "<li><a href='#file$value'>$value</a></li>";
			}
			$out.= "</ul>";
			foreach ($filesToPrint as $key => $value) {
				$out .= "<a name='file$value' /><pre><small><a href='#fileTop'>TOP</a></small><h1>$value</h1>" . str_replace("<br />", "", highlight_file($value, true)) . "</pre>";
			}
		}
		else
			$out = "<hr style='clear:both'/>No files to print";
		return $out;
	}

}

?>
