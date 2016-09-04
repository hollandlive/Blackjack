<?php
class Player {

	public $hand = ar
	public $name;

	function __construct($playersName) {
		$this->name = $playersName;
	}
	
	//initially giving two random cards from the deck to the human and computer players
	public function addCardToHand($card) {
		array_push($this->hand, $card);
		return $this->hand;
		// shuffle($this->deck);
	}

	public function showHand($staticPartOfthePath) {
		foreach ($this->hand as $card) {
			echo "<img src = " . $card->createImageString($staticPartOfthePath) . ">";

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