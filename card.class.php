<?php
class Card {
	public $suit;
	public $face; 
	public $value;
	//public $linkToImage;

	public function createImageString($basePathToImage) {
		//print($card->face . $card->suit . '.jpg');
		$linkToImage = $basePathToImage . $this->face . $this->suit . '.jpg'; 
		//echo "<img src = '/cards'" . $linkToImage . ">";
		return $linkToImage;
		//echo "<img src = " . $pathToImage . ">";
	}

}

?>