<?php 
	function normalizeString($string) {
		$newString = trim($string);
		$newString = stripslashes($newString);
		$newString = htmlspecialchars($newString);
		return $newString;
	}

	function validateString($string) {
		if ($string == "") {
			return "empty";
		}
	}






?>
