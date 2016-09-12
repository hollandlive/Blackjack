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
        <nav class="navbar navbar-default navbar-fixed-top">
            <h2>
                Please press the button
            </h2>
        </nav>
        
    <div class="container">
        <div class="fullscreen">
            <div class="row">
            <div class="col-md-6">
                <h2>Player 1</h2>
            </div>
            <div class="col-md-6">
                <h2>Player 2</h2>
            </div>
            </div>
        </div>
        
 
        <div class ="jumbotron">        
            <form name="form" method="post" action="">
                <button class ="btn btn-info" name="button" value="newgame" type="submit">New Game</button>
                <button class ="btn btn-danger" name="button" value="play" type="submit">Play</button>
                <button class ="btn btn-success" name="button" value="stop" type="submit">Stop</button>
            </form >
        </div>
        
    </div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>	

    </body>
</html>