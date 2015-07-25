<?php
$view = new stdClass();
$view->pageTitle = 'Homepage';

//DEMO - for printing the source code
$view->filesToPrint = array(
	__FILE__,
	__DIR__.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."index.phtml",
	__DIR__.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."header.phtml",
	__DIR__.DIRECTORY_SEPARATOR."views".DIRECTORY_SEPARATOR."template".DIRECTORY_SEPARATOR."footer.phtml",
);

require_once('views/index.phtml');
?>
