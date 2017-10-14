<?php 
if(!empty($_GET['year'])){
	$navsection = $_GET['year']; 
}
?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php include('database-connect.php') ?>
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
				$sermonSql = "SELECT speakerFirst, speakerLast, sermonTitle, filePath, serviceDay, serviceMonth, isVideo
							  FROM sermons
							  INNER JOIN services ON ( sermons.service_id = services.service_id ) 
							  WHERE serviceYear = " . $sermonYear . " ORDER BY serviceMonth DESC, serviceDay DESC";
				$sermonResult = mysql_query($sermonSql);
				while($sermonValues = mysql_fetch_assoc($sermonResult)){	
					echo "<p><a href='get-sermon.php?year=" . $sermonYear . "&month=" . $sermonValues['serviceMonth'] . "&day=" . $sermonValues['serviceDay'] . "' class='sermon-audio sermon-link'>" . $sermonValues['serviceMonth'] . "/" . $sermonValues['serviceDay'] . "/" . $sermonYear . "</a></p>";
				}
					echo '</div>
						  <div id="sermonInfo" class="col-sm-8 center-block sermon-audio">';
						  mysql_data_seek($sermonResult, 0);
						  $sermonFirst = mysql_fetch_assoc($sermonResult);
						  if($sermonFirst['speakerFirst'] == 'Dan' && $sermonFirst['speakerLast'] == 'Lambertson'){
							echo '<img data-toggle="tooltip" title="Speaker: ' . $sermonFirst['speakerFirst'] . ' ' . $sermonFirst['speakerLast'] . '" class="audio-image" src="/images/pastor-lambertson.png"';
							if($sermonFirst['isVideo']){
								echo 'style="display: none" />';
							} else {
								echo '/>';
							}
						  } else {
							echo '<img data-toggle="tooltip" title="Speaker: ' . $sermonFirst['speakerFirst'] . ' ' . $sermonFirst['speakerLast'] . '" class="audio-image" src="/images/default-user.png"';
							if($sermonFirst['isVideo']){
								echo 'style="display: none" />';
							} else {
								echo '/>';
							}
						  }
						  
						  echo "<h2 id='sermonTitle'>" . $sermonFirst['sermonTitle'] . "</h2>";
						  if($sermonFirst['isVideo']){
						  	  echo "<video id='music' preload='true' controls>";
							  echo "<source id='sermonId' src='";
							  if(file_exists($_SERVER["DOCUMENT_ROOT"] . $sermonFirst['filePath'])){
								echo $sermonFirst['filePath'];
							  } else {
								echo $sermonFirst['filePath'];
							  }
							  echo "' type='video/mp4'>";
							  echo "<p><strong>Sorry</strong>, your browser does not support the audio element. Please update your browser.</p></video>";
						  } else {
							  echo "<audio id='music' preload='true'>";
							  echo "<source id='sermonId' src='";
							  if(file_exists($_SERVER["DOCUMENT_ROOT"] . $sermonFirst['filePath'])){
								echo $sermonFirst['filePath'];
							  } else {
								echo "";
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