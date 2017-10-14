<?php


$db = mysqli_connect("localhost","swbiblec_nate","N8ssoh00d","swbiblec_main"); 
if (!$db) {
	die('Could not connect: ' . mysql_error());
}

$worshipFirst = (empty($_POST['worship-first'])) ? '' : $_POST['worship-first'];
$worshipLast = (empty($_POST['worship-last'])) ? '' : $_POST['worship-last'];
$prayerFirst = (empty($_POST['prayer-first'])) ? '' : $_POST['prayer-first'];
$prayerLast = (empty($_POST['prayer-last'])) ? '' : $_POST['prayer-last'];
$pastorFirst = (empty($_POST['pastor-first'])) ? '' : $_POST['pastor-first'];
$pastorLast = (empty($_POST['pastor-last'])) ? '' : $_POST['pastor-last'];
$sermonTitle = (empty($_POST['sermon-title-bulletin'])) ? '' : $_POST['sermon-title-bulletin'];
$sermonVerse = (empty($_POST['sermon-verse'])) ? '' : $_POST['sermon-verse'];
$nurseryLeaders = (empty($_POST['nursery-leaders'])) ? '' : $_POST['nursery-leaders'];
$juniorLeaders = (empty($_POST['junior-leaders'])) ? '' : $_POST['junior-leaders'];
$announcements = (empty($_POST['announcements'])) ? '' : $_POST['announcements'];
$serviceInfo = (empty($_POST['service-info-bulletin'])) ? '' : $_POST['service-info-bulletin'];
$isCancelled = (empty($_POST['cancelled-service'])) ? 0 : $_POST['cancelled-service'];
$sql = '';
$announcementSql = '';
$serviceID = '';
$bulletinID = 0;

if($_POST['bulletinMode'] == "edit"){
	if($worshipFirst != '' && $worshipLast != '' && $prayerFirst != '' && $prayerLast != '' && $pastorFirst != '' && $pastorLast != '' && $sermonTitle != '' && $sermonVerse != '' && $nurseryLeaders != '' && $juniorLeaders != '' && $serviceInfo != ''){
		$serviceArr = explode(':', $serviceInfo);
		$serviceID = $serviceArr[0];
		$sql = "SELECT bulletin_id FROM bulletins WHERE service_id = " . $serviceID;
		$result = mysqli_query($db, $sql);

		$row = mysqli_fetch_assoc($result);
		$bulletinID = $row['bulletin_id'];

		$sql = "UPDATE bulletins SET isCancelled = '" . $isCancelled . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET worshipFirst = '" . addslashes($worshipFirst) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET worshipLast = '" . addslashes($worshipLast) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET prayerFirst = '" . addslashes($prayerFirst) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET prayerLast = '" . addslashes($prayerLast) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET pastorFirst = '" . addslashes($pastorFirst) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET pastorLast = '" . addslashes($pastorLast) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET sermonTitle = '" . addslashes($sermonTitle) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET sermonVerse = '" . addslashes($sermonVerse) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET nurseryLeaders = '" . addslashes($nurseryLeaders) . "' WHERE service_id = " . $serviceID . ";";
		$sql .= "UPDATE bulletins SET juniorLeaders = '" . addslashes($juniorLeaders) . "' WHERE service_id = " . $serviceID;
		
		$querySuccess=false;

		if (mysqli_multi_query($db, $sql)) {
				do {
					mysqli_next_result($db);
					/* store first result set */
					if ($result = mysqli_store_result($db)) {

						mysqli_free_result($result);
					}

				} while (mysqli_more_results($db));
				
			$querySuccess = true;
		}


		if(!$querySuccess ){
			echo "errorCreate";
		} else {
			
			$deleteSql = "DELETE FROM announcements WHERE bulletin_id = " . $bulletinID;
			if(mysqli_query($db, $deleteSql)){

				foreach($announcements as $announcement){
					$announcementSql .= "INSERT INTO announcements (bulletin_id, content) VALUES (" . $bulletinID . ", '" . addslashes($announcement) . "')";
					if(end($announcements) != $announcement){
						$announcementSql .= ";";
					} else {
						$announcementSql .= "";
					}
				}

				if (mysqli_multi_query($db, $announcementSql)) {
					do {
						mysqli_next_result($db);
						if ($result = mysqli_store_result($db)) {

							mysqli_free_result($result);
						}

					} while (mysqli_more_results($db));
				}
				
				echo 'edited';

			} else {
				echo "errorCreate";
			}
			
			/* close connection */
			mysqli_close($db);
		}


	} else {
		die('nofill');
	}
	
} else if($_POST['bulletinMode'] == "create"){
	if($worshipFirst != '' && $worshipLast != '' && $prayerFirst != '' && $prayerLast != '' && $pastorFirst != '' && $pastorLast != '' && $sermonTitle != '' && $sermonVerse != '' && $nurseryLeaders != '' && $juniorLeaders != '' && $serviceInfo != ''){
	$serviceArr = explode(':', $serviceInfo);
	$serviceID = $serviceArr[0];


	$sql = "INSERT INTO bulletins (service_id, isCancelled, worshipFirst, worshipLast, prayerFirst, prayerLast, pastorFirst, pastorLast, sermonTitle, sermonVerse, nurseryLeaders, juniorLeaders) VALUES (" . $serviceID . ", '" . $isCancelled . "', '" . $worshipFirst . "', '" . addslashes($worshipLast) . "', '" . $prayerFirst . "', '" . addslashes($prayerLast) . "', '" . $pastorFirst . "', '" . addslashes($pastorLast) . "', '" . addslashes($sermonTitle) . "', '" . addslashes($sermonVerse) ."', '"  . addslashes($nurseryLeaders) . "', '" . addslashes($juniorLeaders) . "');";
	$sql .= "UPDATE services SET hasBulletin = 1 WHERE service_id = " . $serviceID;


	} else {
		die('nofill');
	}

	$querySuccess=false;

	if (mysqli_multi_query($db, $sql)) {
			$bulletinID = mysqli_insert_id($db);
			do {
				mysqli_next_result($db);
				/* store first result set */
				if ($result = mysqli_store_result($db)) {

					mysqli_free_result($result);
				}

			} while (mysqli_more_results($db));
			
		$querySuccess = true;
	}


	if(!$querySuccess ){
		echo 'errorCreate';
	} else {

		foreach($announcements as $announcement){
			$announcementSql .= "INSERT INTO announcements (bulletin_id, content) VALUES (" . $bulletinID . ", '" . addslashes($announcement) . "')";
			if(end($announcements) != $announcement){
				$announcementSql .= ";";
			} else {
				$announcementSql .= "";
			}
		}

		if (mysqli_multi_query($db, $announcementSql)) {
			do {
				mysqli_next_result($db);
				/* store first result set */
				if ($result = mysqli_store_result($db)) {

					mysqli_free_result($result);
				}

			} while (mysqli_more_results($db));
		}
		
		echo 'created';

	/* close connection */
	mysqli_close($db);

	}
}


?>