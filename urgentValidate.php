<?php

$db = mysqli_connect("localhost","swbiblec_nate","N8ssoh00d","swbiblec_main"); 
if (!$db) {
	die('Could not connect: ' . mysql_error());
}

$announcements = (empty($_POST['urgent-announcements'])) ? '' : $_POST['urgent-announcements'];
$serviceInfo = (empty($_POST['service-info-urgent'])) ? '' : $_POST['service-info-urgent'];
$announcementSql = '';
$serviceID = '';
$bulletinID = 0;


if($announcements != ''){
$serviceArr = explode(':', $serviceInfo);
$serviceID = $serviceArr[0];
$serviceDate = explode('/', $serviceArr[1]);
$bulletinIdSQL = "SELECT bulletin_id FROM bulletins INNER JOIN services ON bulletins.service_id = services.service_id WHERE serviceMonth = '" . $serviceDate[0] . "' AND serviceDay = '" . $serviceDate[1] . "' AND serviceYear = '" . $serviceDate[2] . "'";

$resultBulletinQuery = mysqli_query($db, $bulletinIdSQL);

$bulletinIDArr = mysqli_fetch_assoc($resultBulletinQuery);

$bulletinID = $bulletinIDArr['bulletin_id'];



foreach($announcements as $announcement){
		$announcementSql .= "INSERT INTO announcements (bulletin_id, content, urgent) VALUES (" . $bulletinID . ", '" . addslashes($announcement) . "', true)";
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
		echo 'created';
	} else {
		//echo $announcementSql;
		echo 'errorCreate';
	}


} else {
	die('nofill');
}
	
	

/* close connection */
mysqli_close($db);




?>