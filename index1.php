<?php
require_once 'game.class.php'; 
require_once "deck.class.php";
require_once "player.class.php";
require('smarty/Smarty.class.php');

session_start(); 


$smarty = new Smarty();
$smarty->template_dir = 'smarty/views';
$smarty->compile_dir = 'smarty/tmp';

$smarty->display('index.tpl');

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
			//$game->deck->showDeckCards();
                        //$smarty->register_object('game', $game);
                        $smarty->assign('deck', $game->deck);
                        $smarty->display('card.tpl');
                        //$smarty->assign('players', $players);
                        //$smarty->display('player.tpl');
                        //$smarty->register_object('card', $card);
                        $smarty->display('card.tpl');
                        //$smarty->assign('cardss', $game->deck->showDeckCards());
                        //$smarty->display('cards.tpl');
			//$game->deck->showScoreCards();
                        
                        $_SESSION['newgame'] = serialize($game);
			break; 
		
                case 'play':
			$game = unserialize($_SESSION['newgame']);
			//print_r($game->deck);
                        //$smarty->display('playGame.tpl');
                        $game->gameStatus = $button;
			$game->playButtonPressed();
                        //$smarty->display('cards.tpl');
                        
			$_SESSION['newgame'] = serialize($game);
			//print_r($_SESSION['newgame']);
			break;
		case 'stop':
			$game = unserialize($_SESSION['newgame']);
                        $game->gameStatus = $button;
			$game->stopGame();
			$game->checkTheWinner();
                        //$smarty->display('cards.tpl');
			break;
		default:
			echo "you ve not pressed anything fucker";
	}

 } else { 
 	$smarty->display('index.tpl');
 }
