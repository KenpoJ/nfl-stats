<?php

include_once('functions.php');

callAPI('GET', 
	'https://api.mysportsfeeds.com/v1.2/pull/nfl/2017-regular/cumulative_player_stats.json',
	'2dccc868-f9ab-45ec-a649-92826d', 
	'PH3-Pbd-4DT-7e9'
);

?>