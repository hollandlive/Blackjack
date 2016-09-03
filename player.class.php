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
		// shuffle($this->deck);
	}

	public function showHand($staticPartOfthePath) {
		foreach ($this->hand as $card) {
			echo "<img src = " . $card->createImageString($staticPartOfthePath) . ">";

			//make card as a local variable 
			// 


		//var_dump($this->hand);
		//echo "<img src = '/cards'" . $this-linkToImage . ">";
		}

		//var_dump($this->hand);
	}

	public function calculateScoreInHand() {
		$totalScoreinHand = 0;
		foreach ($this->hand as $cardValue) {
			{  

				$totalScoreinHand += $cardValue->value;
			}
		}
	//echo "This player has" . $totalScoreinHand . "</br></br>";

	return $totalScoreinHand;
	}
		//foreach ($this->hand as $handScore) {
			//$total = $handScore->getTheCardValue();
			//$total += $handScore->getTheCardValue();
			//echo $total;
			//print_r($total);
			//echo "the score is";
			//print_r($handScore);
		
	



//	public function allowMoreCards();
//	public function calculateScore();
	
}

class Computer extends Player {

}

class Human extends Player {
	
}

?>