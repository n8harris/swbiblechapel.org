<?php $navsection = 'policies' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php include('directus-connect.php'); ?>
<div class="main-body">
<h2 class="page-heading">Policies</h2>
	<div class="container">
		<div class="featurette">
		<?php
			$policies = $client->getItems('policies')->getData()[0];
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