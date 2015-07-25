<?php

$view = new stdClass();
$view->pageTitle = 'Blackjack';
$view->number = '';

require_once 'autoload.php';

if (isset($_POST['submit'])) {
    $game = new Game($_POST['players'], $_POST['decks']);
    
    $game->play();
    if(isset($view->result))
    require_once('views/blackjack.phtml');
}

require_once('views/blackjack_start.phtml');