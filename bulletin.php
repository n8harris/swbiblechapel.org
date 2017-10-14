<?php $navsection = 'bulletin' ?>
<?php include('head.php') ?>
<?php include('navigation.php') ?>
<?php include('carousel.php') ?>
<?php include('database-connect.php') ?>
<div class="main-body">
<h2 class="page-heading">Bulletin</h2>
	<div class="container">
		<div class="churchAnnouncements col-sm-12">
		<?php
			error_reporting(E_ALL);
			ini_set('display_errors', 1);
			echo '<div class="well col-sm-4">';
			$bulletinDay = (empty($_GET['day'])) ? '' : $_GET['day'];
			$bulletinMonth = (empty($_GET['month'])) ? '' : $_GET['month'];
			$bulletinYear = (empty($_GET['year'])) ? '' : $_GET['year'];
			if($bulletinDay == '' || $bulletinMonth == '' || $bulletinYear == ''){
				echo "<p>No bulletin information for specified date</p></div>";
			} else {
				$bulletinSql = "SELECT bulletin_id, worshipFirst, worshipLast, prayerFirst, prayerLast, pastorFirst, pastorLast, sermonTitle, sermonVerse, nurseryLeaders, juniorLeaders
							   FROM bulletins
							   INNER JOIN services ON ( bulletins.service_id = services.service_id )
							   WHERE serviceDay = " . $bulletinDay . " AND serviceMonth = " . $bulletinMonth . " AND serviceYear = " . $bulletinYear;
				$bulletinResult = mysql_query($bulletinSql);
				$bulletinValues = mysql_fetch_assoc($bulletinResult);
				if(mysql_num_rows($bulletinResult) == 0){
					echo "<p>No bulletin information for specified date</p></div>";
				} else if($bulletinValues['worshipFirst'] == 'C'){
					echo "<p>No Service Info This Week</p></div>";
					echo '<div class="col-sm-8">
						  <h2>Church <span class="text-orange">Announcements for ' . $bulletinMonth . '/' . $bulletinDay . '/' .$bulletinYear . '</span></h2><ul>';
					
					$announcementsSql = "SELECT content, announcement_id, urgent FROM announcements WHERE bulletin_id = " . $bulletinValues['bulletin_id'] . " ORDER BY urgent DESC";
					$announcementsResult = mysql_query($announcementsSql);
					while($announcementValues=mysql_fetch_assoc($announcementsResult)){
						if($announcementValues['urgent'] == true){
							echo "<div class='alert alert-danger alert-dismissible' role='alert'>";
							echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
							echo $announcementValues['content'];
							echo "</div>";
						} else if ($announcementValues['content'] == '') {
							echo "";
						} else {
							echo "<li>" . $announcementValues['content'] . "</li>";
						}

					}
					
					echo "</ul></div>";
				} else {
					
					echo "<p><strong>Leading in Worship: </strong>" . $bulletinValues['worshipFirst'] . " " . $bulletinValues['worshipLast'];
					echo "<p><strong>Leading in Prayer: </strong>" . $bulletinValues['prayerFirst'] . " " . $bulletinValues['prayerLast'];
					echo "<p><strong>Sermon: </strong>" . $bulletinValues['pastorFirst'] . " " . $bulletinValues['pastorLast'];
					echo "<p><strong>Sermon Title: </strong>" . $bulletinValues['sermonTitle'];
					echo "<p><strong>Sermon Verse: </strong>" . $bulletinValues['sermonVerse'];
					echo "<p><strong>Nursery Leaders: </strong>" . $bulletinValues['nurseryLeaders'];
					echo "<p><strong>Junior Leaders: </strong>" . $bulletinValues['juniorLeaders'];
					echo '</div>
						  <div class="col-sm-8">
						  <h2>Church <span class="text-orange">Announcements for ' . $bulletinMonth . '/' . $bulletinDay . '/' .$bulletinYear . '</span></h2><ul>';
					
					$announcementsSql = "SELECT content, announcement_id, urgent FROM announcements WHERE bulletin_id = " . $bulletinValues['bulletin_id'] . " ORDER BY urgent DESC";
					$announcementsResult = mysql_query($announcementsSql);
					while($announcementValues=mysql_fetch_assoc($announcementsResult)){
						if($announcementValues['urgent'] == true){
							echo "<div class='alert alert-danger alert-dismissible' role='alert'>";
							echo '<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
							echo $announcementValues['content'];
							echo "</div>";
						} else {
							echo "<li>" . $announcementValues['content'] . "</li>";
						}
					}
					
					echo "</ul></div>";

				}
			}

		?>

		
			
				
				
			
			
			
		</div>
		
	</div>
<?php include('map.php') ?>
	
</div>


<?php include('footer.php') ?>