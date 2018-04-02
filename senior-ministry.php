<?php $navsection = 'seniors' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php include('directus-connect.php'); ?>
<div class="main-body">
<h2 class="page-heading">Senior Ministry</h2>
	<div class="container">
		<div class="featurette">
		<?php
			$seniorMinistry = $client->getItems('senior_ministry')->getData()[0];
			echo $seniorMinistry['content'];
			$links = json_decode($seniorMinistry['links'], true);
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