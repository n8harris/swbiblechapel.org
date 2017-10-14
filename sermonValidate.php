<?php

$db = mysqli_connect("localhost","swbiblec_nate","N8ssoh00d","swbiblec_main"); 
if (!$db) {
	die('Could not connect: ' . mysql_error());
}

$speakerFirst = (empty($_POST['speaker-first'])) ? '' : $_POST['speaker-first'];
$speakerLast = (empty($_POST['speaker-last'])) ? '' : $_POST['speaker-last'];
$sermonTitle = (empty($_POST['sermon-title'])) ? '' : $_POST['sermon-title'];
$serviceInfo = (empty($_POST['service-info'])) ? '' : $_POST['service-info'];
$isVideo = $_POST['is-video'] == "on" ? 1 : 0;
$sql = '';
$sqlEdit = '';

if($_POST['sermonMode'] == "edit"){
	if(!empty($_POST['sermon-audio-file']) && $speakerFirst != '' && $speakerLast != '' && $sermonTitle != '' && $serviceInfo != ''){
		$serviceArr = explode(':', $serviceInfo);
		$serviceID = $serviceArr[0];
		$serviceDate = $serviceArr[1];

		$dateArray = explode('/', $serviceDate);
		$month = $dateArray[0];
		$day = $dateArray[1];
		$year = $dateArray[2];

		if(!$isVideo){
			$filepath = '/sermons/' . $year . '/' . $month . '/' . $day . '/';
		} else {
			$filepath = '';
		}
		$sqlEdit = "UPDATE sermons SET speakerFirst = '" . addslashes($speakerFirst) . "' WHERE service_id = " . $serviceID . ";";
		$sqlEdit .= "UPDATE sermons SET speakerLast = '" . addslashes($speakerLast) . "' WHERE service_id = " . $serviceID . ";";
		$sqlEdit .= "UPDATE sermons SET sermonTitle = '" . addslashes($sermonTitle) . "' WHERE service_id = " . $serviceID . ";";
		$sqlEdit .= "UPDATE sermons SET filePath = '" . $filepath . $_POST['sermon-audio-file'] . "' WHERE service_id = " . $serviceID . ";";
		$sqlEdit .= "UPDATE sermons SET isVideo = " . $isVideo . " WHERE service_id = " . $serviceID . ";";
	} else {
		die('nofill');
	}
	
	if (mysqli_multi_query($db, $sqlEdit)) {
				do {
					mysqli_next_result($db);
					/* store first result set */
					if ($result = mysqli_store_result($db)) {

						mysqli_free_result($result);
					}

				} while (mysqli_more_results($db));
				
				echo 'edited';

	} else {
		echo 'errorCreate';
	}

} else if ($_POST['sermonMode'] == "create"){

	if(!empty($_POST['sermon-audio-file']) && $speakerFirst != '' && $speakerLast != '' && $sermonTitle != '' && $serviceInfo != ''){
	$serviceArr = explode(':', $serviceInfo);
	$serviceID = $serviceArr[0];
	$serviceDate = $serviceArr[1];

	$dateArray = explode('/', $serviceDate);
	$month = $dateArray[0];
	$day = $dateArray[1];
	$year = $dateArray[2];

	if(!$isVideo){
		$filepath = '/sermons/' . $year . '/' . $month . '/' . $day . '/';
	} else {
		$filepath = '';
	}

	if(!is_dir('.' . $filepath)){
		if (!mkdir('.' . $filepath, 0777, true)) {
			die('Failed to create folders...');
		}
	}


	/*if(!move_uploaded_file($_FILES['sermon-audio-file']['tmp_name'], $filepath){
		die('Failed to save file...');
	}*/

	$sql = "INSERT INTO sermons (service_id, speakerFirst, speakerLast, sermonTitle, filePath, isVideo) VALUES (" . $serviceID . ", '" . $speakerFirst . "', '" . addslashes($speakerLast) . "', '" . addslashes($sermonTitle) . "', '" . $filepath . $_POST['sermon-audio-file'] . "', " . $isVideo . ");";
	$sql .= "UPDATE services SET hasSermon = 1 WHERE service_id = " . $serviceID;
	} else {
		die('nofill');
	}

	if(!mysqli_multi_query($db,$sql)){
		echo 'errorCreate';
	} else {
		echo 'created';
	}
} 


?>