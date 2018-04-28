<?php $navsection = 'bulletin' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<h2 class="page-heading">Bulletin</h2>
	<div class="container">
		<div class="churchAnnouncements col-sm-12">
		<?php
			echo '<div class="well col-sm-4">';
			$bulletins = $client->getItems('bulletin', [
				'order' => ['id' => 'DESC'],
				'limit' => 1
			]);
			if(count($bulletins->getData()) == 0){
				echo "<p>No bulletin information for specified date</p></div>";
			} else {
				$bulletinData = $bulletins->getData()[0]->getData();
				if(!$bulletinData['sermon']) {
					echo "<p>No bulletin information for specified date</p></div>";
				} else {
					$sermon = $client->getItem('sermon', $bulletinData['sermon']->getData()['id'])->getData();
					$speaker = $client->getItem('speaker', $sermon['speaker']->getData()['id'])->getData();
					$date = date_create($sermon['sermon_date']);
					echo "<p><strong>Leading in Worship: </strong>" . $bulletinData['worship_leader_first_name'] . " " . $bulletinData['worship_leader_last_name'];
					echo "<p><strong>Leading in Prayer: </strong>" . $bulletinData['prayer_leader_first_name'] . " " . $bulletinData['prayer_leader_last_name'];
					echo "<p><strong>Sermon: </strong>" . $speaker['speaker_first'] . " " . $speaker['speaker_last'];
					echo "<p><strong>Sermon Title: </strong>" . $sermon['sermon_title'];
					echo "<p><strong>Sermon Verse: </strong>" . $sermon['sermon_verse'];
					echo "<p><strong>Nursery Leaders: </strong>" . $bulletinData['nursery_leaders'];
					echo "<p><strong>Junior Leaders: </strong>" . $bulletinData['junior_leaders'];
					echo '</div>
							<div class="col-sm-8">
							<h2>Church <span class="text-orange">Announcements for ' . date_format($date, 'm/d/Y') . '</span></h2>';
							$Parsedown = new Parsedown();

							echo $Parsedown->text($bulletinData['announcements']);
					echo "</div>";
				}
			}

		?>

		
			
				
				
			
			
			
		</div>
		
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>