<?php


	include('Mail.php');
    $mail =& Mail::factory("mail");

	$brideName = (empty($_POST['bride-name'])) ? '' : $_POST['bride-name'];
	$brideAge = (empty($_POST['bride-age'])) ? '' : $_POST['bride-age'];
	$brideAddress = (empty($_POST['bride-address'])) ? '' : $_POST['bride-address'];
	$brideCity = (empty($_POST['bride-city'])) ? '' : $_POST['bride-city'];
	$brideState = (empty($_POST['bride-state'])) ? '' : $_POST['bride-state'];
	$brideZip = (empty($_POST['bride-zip-code'])) ? '' : $_POST['bride-zip-code'];
	$bridePhone = (empty($_POST['bride-phone'])) ? '' : $_POST['bride-phone'];
	$brideEmail = (empty($_POST['bride-email'])) ? '' : $_POST['bride-email'];
	$brideTestimony = (empty($_POST['bride-testimony'])) ? '' : $_POST['bride-testimony'];
	$brideAttendSWBC = (!isset($_POST['bride-attend-swbc'])) ? '' : $_POST['bride-attend-swbc'];
	$brideChurchAttend = (empty($_POST['bride-church-attend'])) ? '' : $_POST['bride-church-attend'];
	$brideChurchAddress = (empty($_POST['bride-church-address'])) ? '' : $_POST['bride-church-address'];
	$brideChurchCity = (empty($_POST['bride-church-city'])) ? '' : $_POST['bride-church-city'];
	$brideChurchState = (empty($_POST['bride-church-state'])) ? '' : $_POST['bride-church-state'];
	$brideChurchZip = (empty($_POST['bride-church-zip'])) ? '' : $_POST['bride-church-zip'];
	$brideChurchPhone = (empty($_POST['bride-church-phone'])) ? '' : $_POST['bride-church-phone'];
	$brideChurchPastor = (empty($_POST['bride-church-pastor'])) ? '' : $_POST['bride-church-pastor'];
	$brideAttend = (!isset($_POST['bride-attend'])) ? '' : $_POST['bride-attend'];
	$groomName = (empty($_POST['groom-name'])) ? '' : $_POST['groom-name'];
	$groomAge = (empty($_POST['groom-age'])) ? '' : $_POST['groom-age'];
	$groomAddress = (empty($_POST['groom-address'])) ? '' : $_POST['groom-address'];
	$groomCity = (empty($_POST['groom-city'])) ? '' : $_POST['groom-city'];
	$groomState = (empty($_POST['groom-state'])) ? '' : $_POST['groom-state'];
	$groomZip = (empty($_POST['groom-zip-code'])) ? '' : $_POST['groom-zip-code'];
	$groomPhone = (empty($_POST['groom-phone'])) ? '' : $_POST['groom-phone'];
	$groomEmail = (empty($_POST['groom-email'])) ? '' : $_POST['groom-email'];
	$groomTestimony = (empty($_POST['groom-testimony'])) ? '' : $_POST['groom-testimony'];
	$groomAttendSWBC = (!isset($_POST['groom-attend-swbc'])) ? '' : $_POST['groom-attend-swbc'];
	$groomChurchAttend = (empty($_POST['groom-church-attend'])) ? '' : $_POST['groom-church-attend'];
	$groomChurchAddress = (empty($_POST['groom-church-address'])) ? '' : $_POST['groom-church-address'];
	$groomChurchCity = (empty($_POST['groom-church-city'])) ? '' : $_POST['groom-church-city'];
	$groomChurchState = (empty($_POST['groom-church-state'])) ? '' : $_POST['groom-church-state'];
	$groomChurchZip = (empty($_POST['groom-church-zip'])) ? '' : $_POST['groom-church-zip'];
	$groomChurchPhone = (empty($_POST['groom-church-phone'])) ? '' : $_POST['groom-church-phone'];
	$groomChurchPastor = (empty($_POST['groom-church-pastor'])) ? '' : $_POST['groom-church-pastor'];
	$groomAttend = (!isset($_POST['groom-attend'])) ? '' : $_POST['groom-attend'];
	$firstDate = (empty($_POST['first-date-choice'])) ? '' : $_POST['first-date-choice'];
	$secondDate = (empty($_POST['second-date-choice'])) ? '' : $_POST['second-date-choice'];
	$differentPastorName = (empty($_POST['pastor-name'])) ? '' : $_POST['pastor-name'];
	$churchAffiliation = (empty($_POST['church-affiliation'])) ? '' : $_POST['church-affiliation'];
	$churchAddress = (empty($_POST['church-address'])) ? '' : $_POST['church-address'];
	$churchCity = (empty($_POST['church-city'])) ? '' : $_POST['church-city'];
	$churchState = (empty($_POST['church-state'])) ? '' : $_POST['church-state'];
	$churchZip = (empty($_POST['church-zip'])) ? '' : $_POST['church-zip'];
	$churchPhone = (empty($_POST['church-phone'])) ? '' : $_POST['church-phone'];
	$reason = (empty($_POST['reason'])) ? '' : $_POST['reason'];
	$agreement = (!isset($_POST['agreement'])) ? '' : $_POST['agreement'];
	$otherPastor = false;
	$optionBride = false;
	$optionGroom = false;
	$isValid = true;
	$outputError = '';
	
	
	if(isset($_POST['other-pastor'])){
		$otherPastor = true;
		if($differentPastorName == '' || $churchAffiliation == '' || $churchAddress == '' || $churchCity == '' || $churchState == '' || $churchZip == '' || $churchPhone == '' || $reason == ''){
			$isValid = false;
			 $outputError = 'nofill';
			
		}
	}
	
	if($groomAttendSWBC == 'no'){
		$optionGroom = true;
		if($groomChurchAttend == '' || $groomChurchAddress == '' || $groomChurchCity == '' || $groomChurchState == '' || $groomChurchZip == '' || $groomChurchPhone == '' || $groomChurchPastor == '' || empty($_POST['groom-attend'])){
			$isValid = false;
			$outputError = 'nofill';
		}
	}
	
	if($brideAttendSWBC == 'no'){
		$optionBride = true;
		if($brideChurchAttend == '' || $brideChurchAddress == '' || $brideChurchCity == '' || $brideChurchState == '' || $brideChurchZip == '' || $brideChurchPhone == '' || $brideChurchPastor == '' || empty($_POST['bride-attend'])){
			$isValid = false;
			$outputError = 'nofill';
		}
	}
	
	if($brideName == '' || $brideAge == '' || $brideAddress == '' || $brideCity == '' || $brideState == '' || $brideZip == '' || $bridePhone == '' || $brideEmail == '' || $brideTestimony == '' || $groomName == '' || $groomAge == '' || $groomAddress == '' || $groomCity == '' || $groomState == '' || $groomZip == '' || $groomPhone == '' || $groomEmail == '' || $groomTestimony == '' || $agreement == ''){
		$isValid = false;
		$outputError = 'nofill';
	}
	
	if($outputError != ''){
		$isValid = false;
		echo $outputError;
	} else {
	
	
	
		$from = 'noreply@swbiblechapel.org';
		$to = 'secretary@swbiblechapel.org';
		$headers = array('From'=>$from, 'Subject'=>'Wedding Application for ' . $brideName . ' and ' . $groomName);
		$message = 'BRIDE:' . "\r\n\r\n" . 'Name: ' . $brideName . "\r\n" . 'Age: ' . $brideAge .
					"\r\n" . 'Address Line 1: ' . $brideAddress . "\r\n" . 'City: ' . $brideCity .
					"\r\n" . 'State: ' . $brideState . "\r\n" . 'Zip Code: ' . $brideZip .
					"\r\n" . 'Phone Number: ' . $bridePhone . "\r\n" . 'Email: ' . $brideEmail .
					"\r\n" . 'Testimony: ' . $brideTestimony . "\r\n";
		if($optionBride == true){
			$message .= 'Name of church you attend: ' . $brideChurchAttend . "\r\n" . 'Church Address: ' . $brideChurchAddress .
						"\r\n" . 'Church City: ' . $brideChurchCity . "\r\n" . 'Church State: ' . $brideChurchState .
						"\r\n" . 'Church Zip Code: ' . $brideChurchZip . "\r\n" . 'Church Phone Number: ' . $brideChurchPhone .
						"\r\n" . 'Church Pastor: ' . $brideChurchPastor . "\r\n" . 'How often do you attend? ' . $brideAttend . "\r\n";
		} else {
			$message .= "\r\n";
		}
		
		$message .= 'GROOM:' . "\r\n\r\n" . 'Name: ' . $groomName . "\r\n" . 'Age: ' . $groomAge .
					"\r\n" . 'Address Line 1: ' . $groomAddress . "\r\n" . 'City: ' . $groomCity .
					"\r\n" . 'State: ' . $groomState . "\r\n" . 'Zip Code: ' . $groomZip .
					"\r\n" . 'Phone Number: ' . $groomPhone . "\r\n" . 'Email: ' . $groomEmail .
					"\r\n" . 'Testimony: ' . $groomTestimony . "\r\n";
		if($optionGroom == true){
			$message .= 'Name of church you attend: ' . $groomChurchAttend . "\r\n" . 'Church Address: ' . $groomChurchAddress .
						"\r\n" . 'Church City: ' . $groomChurchCity . "\r\n" . 'Church State: ' . $groomChurchState .
						"\r\n" . 'Church Zip Code: ' . $groomChurchZip . "\r\n" . 'Church Phone Number: ' . $groomChurchPhone .
						"\r\n" . 'Church Pastor: ' . $groomChurchPastor . "\r\n" . 'How often do you attend? ' . $groomAttend . "\r\n";
		} else {
			$message .= "\r\n";
		}
		
		$message .= 'BOTH:' . "\r\n\r\n" . 'Wedding Date First Choice: ' . $firstDate . "\r\n" . 'Wedding Date Second Choice: ' . $secondDate .
					"\r\n";
		
		if($otherPastor == true){
			$message .= 'Pastor Name: ' . $differentPastorName . "\r\n" . 'Church Affiliation: ' . $churchAffiliation .
						"\r\n" . 'Church Address: ' . $churchAddress . "\r\n" . 'Church City: ' . $churchCity .
						"\r\n" . 'Church State: ' . $churchState . "\r\n" . 'Church Zip Code: ' . $churchZip .
						"\r\n" . 'Church Phone: ' . $churchPhone . "\r\n" . 'Reason for this pastor to officiate: ' . $reason . "\r\n";
						
		} else {
			$message .= "\r\n";
		}
		
		$message .= 'Signed: ' . $brideName . ' and ' . $groomName;
		
		$resultName = $brideName . ' and ' . $groomName;
		
		if (!filter_var($brideEmail, FILTER_VALIDATE_EMAIL) || !filter_var($groomEmail, FILTER_VALIDATE_EMAIL)){
			echo 'emailerror';
		} else if ($isValid) {
			if ($mail->send($to, $headers, $message)) { 
				echo $resultName;
			} else { 
				echo 'error'; 
			} 
		}
	}

?>