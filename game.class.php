<?php


//in this version the cards are given:
// 1 card to Computer, 1 card - to Human
// 2nd card to Computer, 1 card - to Human
class Game {

	public $deck;
	public $players = array();

	public function startGame(){
		$this->deck = new Deck();
		shuffle($this->deck->_cards);
		$players = array(new Computer('computer'), new Human('artem'));
		$players[0]->addCardToHand(array_shift($this->deck->_cards));
		$players[1]->addCardToHand(array_shift($this->deck->_cards));
		$players[0]->addCardToHand(array_shift($this->deck->_cards));
		$players[1]->addCardToHand(array_shift($this->deck->_cards));
		echo "Player " . $players[0]->name . " has:" . 'secret score' . "</br>" . "</br>";
                //echo "Player " . $players[0]->name . " has:" . $players[0]->calculateScoreInHand() . "</br>" . "</br>";
		$players[0]->showHand('cards/');
		echo "<br>" . "<br>";
		echo "Player " . $players[1]->name . " has:" . $players[1]->calculateScoreInHand() . "</br>" . "</br>";
		$players[1]->showHand('cards/');
		//save array of two objects PLAYER in to session var
		$_SESSION['players'] = $players;
	}

	public function playButtonPressed(){
		//receive array of two objects from Session var
		$players = $_SESSION['players'];

		if ($players[0]->calculateScoreInHand() <= 17) {

			$allowMoreCards = true;
			$players[0]->addCardToHand(array_shift($this->deck->_cards));

	}	else {

		$allowMoreCards = false;
	}
		$players[1]->addCardToHand(array_shift($this->deck->_cards));
		echo "<br>" . "<br>";
		echo "Player " . $players[0]->name . " has:" . 'secret score' . "</br>" . "</br>";
                //echo "Player " . $players[0]->name . " has:" . $players[0]->calculateScoreInHand() . "</br>" . "</br>";

		$players[0]->showHand('cards/');
		echo "<br>" . "<br>";
		echo "Player " . $players[1]->name . " has:" . $players[1]->calculateScoreInHand() . "</br>" . "</br>";
		$players[1]->showHand('cards/');
		//save array of two objects PLAYER in to session var
		$_SESSION['players'] = $players;
	}

	public function stopGame(){
		//receive array of two objects from Session var
		$players = $_SESSION['players'];
		echo "<br>" . "<br>";
		echo "Player " . $players[0]->name . " has:" . $players[0]->calculateScoreInHand() . "</br>" . "</br>";
		$players[0]->showHand('cards/');
		echo "<br>" . "<br>";
		echo "Player " . $players[1]->name . " has:" . $players[1]->calculateScoreInHand() . "</br>" . "</br>";
		$players[1]->showHand('cards/');
		//save array of two objects PLAYER in to session var
		$_SESSION['players'] = $players;
	}

	public function checkTheWinner(){
		//receive array of two objects from Session var
		$players = $_SESSION['players'];
		//for checking winners I use also a case when it is two Aces - it gives score 22 but it beats the enemy 
		if ($players[0]->calculateScoreInHand() > $players[1]->calculateScoreInHand() && ($players[0]->calculateScoreInHand() <= 22)) {
			echo "<br>" . "<br>" . "<br>";
			echo "computer win";
		} elseif ($players[0]->calculateScoreInHand() < $players[1]->calculateScoreInHand() && ($players[1]->calculateScoreInHand() <= 22)) {
			echo "<br>" . "<br>" . "<br>";
			echo "art win";
		} elseif ($players[0]->calculateScoreInHand() == $players[1]->calculateScoreInHand()) {
			echo "<br>" . "<br>" . "<br>";
			echo "Y O U    A R E   T I E!!!";
		} elseif ($players[0]->calculateScoreInHand() > $players[1]->calculateScoreInHand() && ($players[0]->calculateScoreInHand() > 22)) {
			echo "<br>" . "<br>" . "<br>";
			echo "computer lost";	
			}  
		else {
			echo "<br>" . "<br>" . "<br>";
			echo "computer win";
		}
		}
	}

?>