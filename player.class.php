<?php
class Player {

	public $hand = array();
	public $allowMoreCards = true;
	public $name;

	function __construct($playersName) {
		$this->name = $playersName;
	}
	
	//initially giving two random cards from the deck to the human and computer players
	public function addCardToHand($card) {
		array_push($this->hand, $card);
		return $this->hand;
	}

	public function showHand($staticPartOfthePath) {
		foreach ($this->hand as $card) {
			echo "<img src = " . $card->createImageString($staticPartOfthePath) . ">";

			//make card as a local variable 
		}
	}

	public function calculateScoreInHand() {
		$totalScoreinHand = 0;
		foreach ($this->hand as $cardValue) {
			{  

				$totalScoreinHand += $cardValue->value;
			}
		}

	return $totalScoreinHand;
	}
	
}

class Computer extends Player {

}

class Human extends Player {
	
}

?>