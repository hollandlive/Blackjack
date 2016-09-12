<?php
require_once 'game.class.php'; 
require_once "deck.class.php";
require_once "player.class.php";
require_once('smarty/Smarty.class.php');

session_start(); 

$smarty = new Smarty();
$smarty->template_dir = 'smarty/views';
$smarty->compile_dir = 'smarty/tmp';

$smarty->display('playGame.tpl');

?>

        
        
                

<?php

if (!empty($_POST['button'])) {
	$button = $_POST['button']; 
}

if (isset($button)) {
	switch ($button) {
		case 'newgame':
			//echo "new game pressed";
			$game = new Game();
                        $game->gameStatus = $button;
			$game->startGame();
			$game->deck->showDeckCards();
			//$game->deck->showScoreCards();
                        $_SESSION['newgame'] = serialize($game);
			break; 
		
                case 'play':
			$game = unserialize($_SESSION['newgame']);
			//print_r($game->deck);
                        $game->gameStatus = $button;
			$game->playButtonPressed();
			$_SESSION['newgame'] = serialize($game);
			//print_r($_SESSION['newgame']);
			break;
		case 'stop':
			$game = unserialize($_SESSION['newgame']);
                        $game->gameStatus = $button;
			$game->stopGame();
			$game->checkTheWinner();
			break;
		default:
			echo "you ve not pressed anything fucker";
	}

 } else { 
 	echo "<nav class=\"navbar navbar-default navbar-fixed-top\"><h2>" . 'Please press the button' . "</h2></nav>"; 
 }

?>