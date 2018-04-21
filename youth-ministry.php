<?php $navsection = 'youth' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<?php
	$youthMinistry = $client->getItems('youth_ministry')->getData()[0];
?>
<h2 class="page-heading"><?php $youthMinistry['title'] ?></h2>
	<div class="container">
		<div class="featurette">
			<?php
			echo $youthMinistry['content'];
			$links = json_decode($youthMinistry['links'], true);
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