<?php $navsection = 'applications' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php include('wedding-application.php') ?>
<?php include('membership-application.php') ?>
<div class="main-body">
<?php
	$applications = $client->getItems('applications')->getData()[0];
	$attachments = str_getcsv($applications['attachments']);
?>
<h2 class="page-heading"><?php echo $applications['title'] ?></h2>
	<div class="container marketing">
		<div class="featurette">
			<div class="application-buttons col-sm-12">
				<h2>Online Applications</h2>
				<p class="lead side-buttons"><a href="#wedding-application" data-toggle="modal" class="btn btn-lg btn-primary">Wedding Ceremony Application</a></p>
				<p class="lead side-buttons"><a href="#membership-application" data-toggle="modal" class="btn btn-lg btn-primary">Membership Application</a></p>
			</div>
			<div class="application-buttons col-sm-12">
				<h2>Printable Forms (PDF)</h2>
				<?php
				foreach($attachments as $attachment) {
					if ($attachment) {
						$file = $client->getFile($attachment)->getData();
						echo '<p class="lead side-buttons"><a href="' . $file['url'] . '" target="_blank" class="btn btn-lg btn-primary">' . $file['title'] . '</a></p>';
					}
				}
				?>
			</div>
		</div>
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>