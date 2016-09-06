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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" type="text/css"  />
    </head>

    <body>
        
        
        
    <div class="container">
      <div class="header clearfix">

        <h3 class="text-muted">BlackJack</h3>
      </div>

      <div class="jumbotron">
        <h1>Welcome to BlackJack</h1>
        <p class="lead">The rules of BJ are simple</p>
       
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
			$game->startGame();
			$game->deck->showDeckCards();
			//$game->deck->showScoreCards();
                        $_SESSION['newgame'] = serialize($game);
			break; 
		
                case 'play':
			$game = unserialize($_SESSION['newgame']);
			//print_r($game->deck);
			$game->playButtonPressed();
			$_SESSION['newgame'] = serialize($game);
			//print_r($_SESSION['newgame']);
			break;
		case 'stop':
			$game = unserialize($_SESSION['newgame']);
			$game->stopGame();
			$game->checkTheWinner();
			break;
		default:
			echo "you ve not pressed anything fucker";
	}

 } else { 
 	echo 'Please press the button'; 
 }

?>
        <div class ="jumbotron">        
        <form name="form" method="post" action="">
		<button class ="btn btn-info" name="button" value="newgame" type="submit">New Game</button>
		<button class ="btn btn-danger" name="button" value="play" type="submit">Play</button>
		<button class ="btn btn-success" name="button" value="stop" type="submit">Stop</button>
	</form >
        </div>
               
     

    </div>
	
	


<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>