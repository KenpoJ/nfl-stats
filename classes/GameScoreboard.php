<?php

class GameScoreboard extends MySportsFeeds {

	var $gameScores;
	var $resp;

	function getGameScores($date=20171001) {
		$url = '2017-regular/scoreboard.json?fordate=' . $date; 
		$resp = parent::callApi($url);

		$gameScores = $resp->scoreboard->gameScore;
		return $gameScores;
	}

}

?>