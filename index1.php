<?php
require_once 'game.class.php'; 
require_once "deck.class.php";
require_once "player.class.php";

session_start(); 

require 'vendor/mustache/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();



//echo scandir(__FILE__); 


$m = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/views'),
));



 echo $m->getLoader()->load();
// loads template from `views/hello_world.mustache` and renders it.
//echo $m->render('/views/hello_world', array('planet' => 'world'));

// loads template from `views/hello_world.mustache` and renders it.
//echo $m->render('hello_world', array('planet' => 'world'));


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
 	echo "Please press any button"; 
 }

?>

    </div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>	

	</body>
</html>