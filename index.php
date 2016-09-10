<?php
require_once 'game.class.php'; 
require_once "deck.class.php";
require_once "player.class.php";

session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BlackJack Game v 1.0 </title>
    
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom style -->
    <link rel="stylesheet" href="css/style.css" type="text/css"  />
    <!--<link rel="stylesheet" href="css/app.css" type="text/css"  />-->
    </head>

    <body>
        
        
        
    <div class="container">
 
        <div class ="jumbotron">        
                    <form name="form" method="post" action="">
		<button class ="btn btn-info" name="button" value="newgame" type="submit">New Game</button>
		<button class ="btn btn-danger" name="button" value="play" type="submit">Play</button>
		<button class ="btn btn-success" name="button" value="stop" type="submit">Stop</button>
	</form >
        </div>
        
        
                

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

    </div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>	

	</body>
</html>