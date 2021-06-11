<?php

// Update 2021
class Card {
	public $suit;
	public $face;
	public $value;

	public function createImageString($basePathToImage) {
		$linkToImage = $basePathToImage . $this->face . $this->suit . '.jpg';
		return $linkToImage;
	}

}

?>
