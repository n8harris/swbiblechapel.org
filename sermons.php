<?php 
if(!empty($_GET['year'])){
	$navsection = $_GET['year']; 
}
?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<div class="main-body">
<h2 class="page-heading"><?php
	if(!empty($_GET['year'])){
		echo $_GET['year'] . ' Sermons';
	} else {
		echo 'Sermons';
	}	
	?></h2>
	<div class="container">
		<div class="col-sm-12">
		<?php
			echo '<div id="churchSermons">';
			echo '<div class="well col-sm-4">';
			echo "<p><strong>Sermons: </strong></p>";
			$sermonYear = (empty($_GET['year'])) ? '' : $_GET['year'];
			if($sermonYear == ''){
				echo "<p>No sermon information for specified date</p></div>";
			} else {
				$sermons = $client->getItems('sermon', [
					'order' => ['sermon_date' => 'DESC']
				])->getData();
				$sermonFirst = null;
				foreach($sermons as $sermon){	
					$timeStamp = strtotime($sermon['sermon_date']);
					$year = date('Y', $timeStamp);
					if ($sermonYear == $year) {
						if (!$sermonFirst) {
							if ($sermon['file_path']){
								$sermonFirst = $sermon;
							}
						}
						if ($sermon['file_path']) {
							echo "<p><a href='get-sermon.php?id=" . $sermon['id'] . "' class='sermon-audio sermon-link'>" . $sermon['sermon_title'] . " - " . date_format(date_create($sermon['sermon_date']), 'm/d/Y') . "</a></p>";
						}
					}
				}
					echo '</div>
						  <div id="sermonInfo" class="col-sm-8 center-block sermon-audio">';
							$speaker = $client->getItem('speaker', $sermonFirst['speaker']->getData()['id'])->getData();
							$imageUrl = $client->getFile($speaker['speaker_image']->getData()['id'])->getData()['url'];
							echo '<div data-toggle="tooltip" title="Speaker: ' . $speaker['speaker_first'] . ' ' . $speaker['speaker_last'] . '" class="circle-crop center-circle-image audio-image-wrapper"><img class="circle-img audio-image" src="' . $imageUrl . '"';
							if($sermonFirst['is_video']){
								echo 'style="display: none" /></div>';
							} else {
								echo '/></div>';
							}
						  
						  echo "<h2 id='sermonTitle'>" . $sermonFirst['sermon_title'] . "</h2>";
						  if($sermonFirst['is_video']){
						  	  echo "<video id='music' preload='true' controls>";
							  echo "<source id='sermonId' src='";
							  if(file_exists($_SERVER["DOCUMENT_ROOT"] . $sermonFirst['file_path'])){
								echo $sermonFirst['file_path'];
							  } else {
								echo $sermonFirst['file_path'];
							  }
							  echo "' type='video/mp4'>";
							  echo "<p><strong>Sorry</strong>, your browser does not support the audio element. Please update your browser.</p></video>";
						  } else {
							  echo "<audio id='music' preload='true'>";
							  echo "<source id='sermonId' src='";
							  if(file_exists($_SERVER["DOCUMENT_ROOT"] . $sermonFirst['file_path'])){
								echo $sermonFirst['file_path'];
							  } else {
								echo $sermonFirst['file_path'];
							  }
							  echo "' type='audio/mpeg'>";
							  echo "<p><strong>Sorry</strong>, your browser does not support the audio element. Please update your browser.</p></audio>";
						  }
						  echo "</div></div>";

			}

		?>

		
			
				
				
			
			
			
		</div>
		
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>