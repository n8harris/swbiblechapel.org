<?php $navsection = 'policies' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<?php
	$policies = $client->getItems('policies')->getData()[0];
?>
<h2 class="page-heading"><?php echo $policies['title'] ?></h2>
	<div class="container">
		<div class="featurette">
		<?php
			$attachments = str_getcsv($policies['attachments']);
			echo $policies['content'];
			foreach($attachments as $attachment) {
				if ($attachment) {
					$file = $client->getFile($attachment)->getData();
					echo '<p class="lead side-buttons"><a href="' . $file['url'] . '" target="_blank" class="btn btn-lg btn-primary">' . 'View ' . $file['title'] . '</a></p>';
				}
			}
		?>
		</div>
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>