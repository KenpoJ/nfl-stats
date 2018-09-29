<?php
include_once('functions.php');
include_once('classes/PlayerList.php');
include_once('inc/header.php');
?>

<div class="hero short">
	<div class="hero-overlay container">
		<h2>Players</h2>
	</div>
</div>

<div class="content players">
	<div class="container grid">

		<?php

			$obj = new PlayerList();

			$playerList = $obj->getPlayerList(50);

			foreach($playerList as $ind) { ?>

				<div class="player-card">
					<div class="player-card-top <?php echo $ind->team->Abbreviation; ?> small">
						<h3 class="player-name"><?php echo $ind->player->FirstName; ?> <?php echo $ind->player->LastName; ?></h3>
						<div class="player-id">
							<div class="player-number pull-left">#<?php echo $ind->player->JerseyNumber; ?></div>
							<div class="player-position pull-right"><?php echo $ind->player->Position; ?></div>
						</div>
						<div class="player-team">
							<h4><span class="team-city"><?php echo $ind->team->City; ?></span> <span class="team-name"><?php echo $ind->team->Name; ?></span></h4>
						</div>
					</div>
					<div class="player-card-body">

					</div>
				</div>
				
	        <?php } ?>
		
		<!-- <div class="player-card">
			<div class="player-card-top GB small">
				<h3 class="player-name">Aaron Rogers</h3>
				<div class="player-id">
					<div class="player-number pull-left">#12</div>
					<div class="player-position pull-right">QB</div>
				</div>
				<div class="player-team">
					<h4><span class="team-city">Green Bay</span> <span class="team-name">Packers</span></h4>
				</div>
			</div>
			<div class="player-card-body">

			</div>
		</div> -->

	</div>
</div>

<?php
include_once('inc/footer.php');
?>