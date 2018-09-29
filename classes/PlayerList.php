<?php
require_once('MySportsFeeds.php');

class PlayerList extends MySportsFeeds {

	var $limit = NULL;
	var $playerList;
	var $resp;

	function getPlayerList($limit) {
		$url = '2017-regular/cumulative_player_stats.json?limit=' . $limit; 
		$resp = parent::callApi($url);

		$playerList = $resp -> cumulativeplayerstats -> playerstatsentry;
		return $playerList;
	}
	
}

/*$playerList = new PlayerList;

echo $playerList;

$playerList.curlPlayers();*/

?>