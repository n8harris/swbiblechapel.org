<?php $navsection = 'home' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php
	$homepage = $client->getItems('homepage')->getData()[0];
?>
<div class="main-body">
<h2 class="page-heading page-heading-home"><?php echo $homepage['tagline'] ?></h2>
	<div class="container marketing">
		<div class="featurette">
			<?php
				$Parsedown = new Parsedown();

				echo $Parsedown->text($homepage['note_section']);
			?>
		<p class="lead"><a class="read-expand btn btn-lg btn-primary">Read More</a></p>
		</div>
		<div class="featurette feat-main">
			<?php
				$Parsedown = new Parsedown();

				echo $Parsedown->text($homepage['events_section']);
				$links = json_decode($homepage['calendar_link'], true);
				if ($links) {
					foreach($links as $key => $link) {
						echo '<p class="lead"><a href="' . $link . '" class="btn btn-lg btn-primary">' . $key . '</a></p>';
					}
				}
			?>
		 </div>
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>