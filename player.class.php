<?php
class Player {

	public $hand = array();
	public $allowMoreCards = true;
	public $name;
        public $cardVisible;
        public $scoreVisible;

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
                    if ($this->cardVisible == true) {
			echo "<div class ='card'><img src = " . $card->createImageString($staticPartOfthePath) . "></div>";
                    } else {
                        echo "<div class ='card'><img src = " . "cards/blanc.jpg" . "></div>";

                        //echo "<img src = " . $card->createImageString($staticPartOfthePath) . ">";
                    }
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
    
    public function __construct($playersName)
    {
        $this->cardVisible = false;
        $this->scoreVisible = false;
        parent::__construct($playersName);
    } 

}

class Human extends Player {
    
    public function __construct($playersName)
    {
        $this->scoreVisible = true;
        $this->cardVisible = true;
        parent::__construct($playersName);
    }
	
}
