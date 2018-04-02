<?php $navsection = 'missionary-support' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php include('directus-connect.php'); ?>
<div class="main-body">
<h2 class="page-heading page-heading-home">Missionary Support</h2>
	<div class="container marketing">
		<div class="featurette">
			<?php
			$support = $client->getItems('missionary_support')->getData()[0];
			echo $support['content'];
			?>
		<div class="col-sm-8 well">
		<?php
			echo $support['missionaries'];
		?>
		</div>
	</div>
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>