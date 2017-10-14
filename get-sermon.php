<?php
include ('database-connect.php');

$day = (empty($_GET['day'])) ? '' : $_GET['day'];
$month = (empty($_GET['month'])) ? '' : $_GET['month'];
$year = (empty($_GET['year'])) ? '' : $_GET['year'];

if($day == '' || $month == '' || $year == ''){
	echo 'nofill';
} else {
	$sql = "SELECT speakerFirst, speakerLast, sermonTitle, filePath, isVideo
			  FROM sermons
			  INNER JOIN services ON ( sermons.service_id = services.service_id ) 
			  WHERE serviceYear = " . $year . " AND serviceMonth = " . $month . " AND serviceDay = " . $day;
	
	$resultQuery = mysql_query($sql);
	
	if(mysql_num_rows($resultQuery) == 0){
		echo 'nofill';
	} else {
		$sermonValues = mysql_fetch_assoc($resultQuery);
		$imgFile = '';
		if($sermonValues['speakerFirst'] == 'Dan' && $sermonValues['speakerLast'] == 'Lambertson'){
			$imgFile = "/images/pastor-lambertson.png";
		} else {
			$imgFile = "/images/default-user.png";
		}
		echo $sermonValues['speakerFirst'] . "|" . $sermonValues['speakerLast'] . "|" . $imgFile . "|" . $sermonValues['sermonTitle'] . "|";
		if(isset($sermonValues['isVideo'])){
			if(!$sermonValues['isVideo']){
				if(file_exists($_SERVER["DOCUMENT_ROOT"] . $sermonValues['filePath'])){
					echo $sermonValues['filePath'] . "|" . false;
				} else {
					echo "" . "|" . false;
				}
			} else {
				echo $sermonValues['filePath'] . "|" . true;
			}
		}

	}
}
?>