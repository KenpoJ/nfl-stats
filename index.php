<?php
include_once('functions.php');
include_once('classes/PlayerList.php');
include_once('classes/GameScoreboard.php');
include_once('inc/header.php');
include_once('inc/hero.php');
?>

<div class="content home">
	<div class="container">
		<h2>2017 NFL Stats</h2>
		<div class="grid">
			<div class="col">
				<h2>Players</h2>

				<table class="table table-striped table-players">
					<thead>
						<tr>
							<th>Name</th>
							<th>Position</th>
							<th>Number</th>
							<th>Team</th>
						</tr>
					</thead>
					<tbody>
						<?php

							$obj = new PlayerList();

							$homePlayerList = $obj->getPlayerList(10);

							foreach($homePlayerList as $ind) {
								echo '<tr>';
								echo '<td>' .  $ind -> player -> FirstName . ' ' . $ind -> player -> LastName . '</td>';
								echo '<td>' .  $ind -> player -> Position . '</td>';
								echo '<td>#' .  $ind -> player -> JerseyNumber . '</td>';
								echo '<td>' .  $ind -> team -> Abbreviation . '</td>';
								echo '</tr>';
					        }
						?>
					</tbody>
				</table>
				<button type="button" class="btn btn-default btn-block">See All Players</button>
			</div>

			<div class="col">
				<h2>Games</h2>
				<ul class="table-scores">
					<?php

						$gameObj = new GameScoreboard();

						$homeGameScores = $gameObj->getGameScores(20171217);

						foreach($homeGameScores as $score) {
							// var_dump($game -> game);
							echo '<li class="flex">';
							echo '<div class="team-away ' . $score -> game -> awayTeam -> Abbreviation . '">';
							echo '<span class="team-name">' . $score -> game -> awayTeam -> Abbreviation . '</span>';
							echo '<span class="team-score">' . $score -> awayScore . '</span>';
							echo '</div>';
							echo '<div class="text-center">';
							echo '<span>vs</span>';
							echo '</div>';
							echo '<div class="team-home ' . $score -> game -> homeTeam -> Abbreviation . '">';
							echo '<span class="team-score">' . $score -> homeScore . '</span>';
							echo '<span class="team-name">' . $score -> game -> homeTeam -> Abbreviation . '</span>';
							echo '</div>';
							echo '</li>';
				        }
					?>
				</ul>
				<button type="button" class="btn btn-default btn-block">See All Games</button>
			</div>
			<div class="col">
				<h2>Rankings</h2>
				<table class="table table-striped table-standings">
					<thead>
						<tr>
							<th>Team</th>
							<th>Rank</th>
							<th>Offensive Yds</th>
						</tr>
					</thead>
					<tbody>
						<?php
							// API call for game info
							$resp = callAPI('GET', 
								'https://api.mysportsfeeds.com/v1.2/pull/nfl/2017-regular/overall_team_standings.json?limit=10',
								'2dccc868-f9ab-45ec-a649-92826d', 
								'PH3-Pbd-4DT-7e9'
							);
							// var_dump($resp);
							$standings = $resp -> overallteamstandings -> teamstandingsentry;
							// var_dump($standings);
							foreach($standings as $standing) {
								echo '<tr>';
								echo '<td>' . $standing->team->City . ' ' . $standing->team->Name . '</td>';
								echo '<td>' . $standing->rank . '</td>';
								echo '<td>' . $standing->stats->OffenseYds->{'#text'} . '</td>';
								// echo '<td>' . var_dump($standing->stats->OffenseYds) . '</td>';
							}
						?>
					</tbody>
				</table>
				<button type="button" class="btn btn-default btn-block">See All Teams</button>
			</div>
		</div>
	</div>
</div>

<?php
include_once('inc/footer.php');
?>