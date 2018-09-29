<?php
include_once('functions.php');
include_once('classes/PlayerList.php');
include_once('classes/GameScoreboard.php');
include_once('inc/header.php');
include_once('inc/hero.php');
?>

<div class="content games">
	<div class="container">

		<form class="form-inline" name="" action="">
			<div class="form-group">
				<label>Year</label>
				<select id="year" name="year" class="form-control">
					<option value="2017" selected>2017</option>
					<option value="2017">2016</option>
					<option value="2017">2015</option>
					<option value="2017">2014</option>
				</select>
			</div>
			<div class="form-group">
				<label>Season</label>
				<select id="season" name="season" class="form-control">
					<option value="regular" selected>Regular</option>
					<option value="playoffs">Playoffs</option>
				</select>
			</div>
			<div class="form-group">
				<label>Week</label>
				<select id="week" name="week" class="form-control">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
				</select>
			</div>
			<button class="btn btn-default" type="submit" name="submit">Submit</button>
		</form>
		<?php

		$gamesObj = new GameScoreboard();

		$gameScores = $gamesObj->getGameScores(20171217);
		?>
		<h2 class="game-heading"></h2>
		<ul class="table-scores">
		<?php
		foreach($gameScores as $score) {
			// var_dump($game -> game);
			echo '<li class="flex">';
			echo '<div class="team-away small ' . $score -> game -> awayTeam -> Abbreviation . '">';
			echo '<span class="team-name">' . $score -> game -> awayTeam -> Abbreviation . '</span>';
			echo '<span class="team-score">' . $score -> awayScore . '</span>';
			echo '</div>';
			echo '<div class="text-center">';
			echo '<span>vs</span>';
			echo '</div>';
			echo '<div class="team-home small ' . $score -> game -> homeTeam -> Abbreviation . '">';
			echo '<span class="team-score">' . $score -> homeScore . '</span>';
			echo '<span class="team-name">' . $score -> game -> homeTeam -> Abbreviation . '</span>';
			echo '</div>';
			echo '</li>';
		}

		?>
		</ul>
	</div>
</div>

<?php
include_once('inc/footer.php');
?>