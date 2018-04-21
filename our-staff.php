<?php $navsection = 'our-staff' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<h2 class="page-heading">Our Staff</h2>
	<div class="container">
		<?php
		$staff = $client->getItems('staff_members')->getData();
		foreach($staff as $staffMember){
			if ($staffMember['include_on_our_staff_page']) {
				echo '<div class="featurette staff">';
				$imgUrl = 'http://swbiblechapel.org' . $client->getFile($staffMember['picture']->getData()['id'])->getData()['url'];
				$staffMemberImagePull = 'pull-right';
				if ($staffMember['pull_image_left']) {
					$staffMemberImagePull = 'pull-left';
				}
				echo '<div class="circle-crop ' . $staffMemberImagePull . '"><img class="circle-img" src="' . $imgUrl . '"></div>';
				echo '<h2 class="featurette-heading">' . $staffMember['staff_first_name'] . ' <span class="text-orange">' . $staffMember['staff_last_name'] . '</span></h2>';
				$Parsedown = new Parsedown();
				echo $Parsedown->text($staffMember['bio']);
				echo '<a data-toggle="modal" href="#contact-modal" data-contact-email="' . $staffMember['email'] . '" class="contact-person btn btn-lg btn-primary">Contact ' . $staffMember['staff_first_name'] . ' ' . $staffMember['staff_last_name'] . '</a>';
				echo '</div>';
			}
		}
		?>
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>