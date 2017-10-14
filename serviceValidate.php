<?php
include('database-connect.php');


$date = (empty($_POST['service-date'])) ? '' : $_POST['service-date'];
$sql = '';
$check = true;



if($date != ''){
	$dateArray = explode("/", $date);
	$month = $dateArray[0];
	$day = $dateArray[1];
	$year = $dateArray[2];
	$sqlCheck = "SELECT * FROM services WHERE serviceDay = '" . $day . "' AND serviceMonth = '" . $month . "' AND serviceYear = '" . $year . "'";
	$result = mysql_query($sqlCheck);
	if (mysql_num_rows($result)) {
		$check = false;
	}

	$sql = "INSERT INTO services (hasBulletin, hasSermon, serviceDay, serviceMonth, serviceYear) VALUES (0, 0, '" . $day . "', '" . $month . "', '" . $year . "')";
}

if($check == false){
	echo 'alreadyexists';
}
else if($date == ''){
	echo 'nofill';
}
else if(!mysql_query($sql)){
	echo 'errorCreate';
} else {
	echo 'created';
}


?>