<?php $navsection = 'missionary-support' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<?php
	$support = $client->getItems('missionary_support')->getData()[0];
?>
<h2 class="page-heading page-heading-home"><?php echo $support['title'] ?></h2>
	<div class="container marketing">
		<div class="featurette">
			<?php
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