<?php


	include('Mail.php');
    $mail =& Mail::factory("mail");

	$membershipName = (empty($_POST['membership-name'])) ? '' : $_POST['membership-name'];
	$membershipAddress = (empty($_POST['membership-address'])) ? '' : $_POST['membership-address'];
	$membershipCity = (empty($_POST['membership-city'])) ? '' : $_POST['membership-city'];
	$membershipState = (empty($_POST['membership-state'])) ? '' : $_POST['membership-state'];
	$membershipZip = (empty($_POST['membership-zip-code'])) ? '' : $_POST['membership-zip-code'];
	$membershipPhone = (empty($_POST['membership-phone'])) ? '' : $_POST['membership-phone'];
	$membershipEmail = (empty($_POST['membership-email'])) ? '' : $_POST['membership-email'];
	$membershipTestimony = (empty($_POST['membership-testimony'])) ? '' : $_POST['membership-testimony'];
	$membershipBaptism = (!isset($_POST['membership-baptism'])) ? '' : $_POST['membership-baptism'];
	$baptismDate = (empty($_POST['baptism-date'])) ? '' : $_POST['baptism-date'];
	$memberChurch = (!isset($_POST['membership-church'])) ? '' : $_POST['membership-church'];
	$currentChurchName = (empty($_POST['member-church-name'])) ? '' : $_POST['member-church-name'];
	$currentChurchAddress = (empty($_POST['member-church-address'])) ? '' : $_POST['member-church-address'];
	$currentChurchCity = (empty($_POST['member-church-city'])) ? '' : $_POST['member-church-city'];
	$currentChurchState = (empty($_POST['member-church-state'])) ? '' : $_POST['member-church-state'];
	$currentChurchZip = (empty($_POST['member-church-zip-code'])) ? '' : $_POST['member-church-zip-code'];
	$affiliationChurchName = (empty($_POST['affiliation-church-name'])) ? '' : $_POST['affiliation-church-name'];
	$affiliationChurchAddress = (empty($_POST['affiliation-church-address'])) ? '' : $_POST['affiliation-church-address'];
	$affiliationChurchCity = (empty($_POST['affiliation-church-city'])) ? '' : $_POST['affiliation-church-city'];
	$affiliationChurchState = (empty($_POST['affiliation-church-state'])) ? '' : $_POST['affiliation-church-state'];
	$affiliationChurchZip = (empty($_POST['affiliation-church-zip-code'])) ? '' : $_POST['affiliation-church-zip-code'];
	$agreeConstitution = (!isset($_POST['constitution-agree'])) ? '' : $_POST['constitution-agree'];
	$agreeDoctrine = (!isset($_POST['constitution-doctrine-agree'])) ? '' : $_POST['constitution-doctrine-agree'];
	$fulfillCovenant = (!isset($_POST['fulfill-covenant-agree'])) ? '' : $_POST['fulfill-covenant-agree'];
	$baptized = false;
	$currentMember = false;
	$isValid = true;
	$outputError = '';
	
	
	if(isset($_POST['membership-baptism'])){
		$baptized = true;
		if($baptismDate == ''){
			$isValid = false;
			$outputError = 'nofill';
			
		}
	}
	
	if($memberChurch == 'no'){
		$currentMember = false;
		if($affiliationChurchName == '' || $affiliationChurchAddress == '' || $affiliationChurchCity == '' || $affiliationChurchState == '' || $affiliationChurchZip == ''){
			$isValid = false;
			$outputError = 'nofill';
		}
	} else if($memberChurch == 'yes'){
		$currentMember = true;
		if($currentChurchName == '' || $currentChurchAddress == '' || $currentChurchCity == '' || $currentChurchState == '' || $currentChurchZip == ''){
			$isValid = false;
			$outputError = 'nofill';
		}
	}
	
	if($membershipName == '' || $membershipAddress == '' || $membershipCity == '' || $membershipState == '' || $membershipZip == '' || $membershipPhone == '' || $membershipEmail == '' || $membershipTestimony == '' || $membershipBaptism == '' || $memberChurch == '' || $agreeConstitution == '' ||	$agreeDoctrine == '' ||	$fulfillCovenant == ''){
		$isValid = false;
		$outputError = 'nofill';
	}
	
	if($outputError != ''){
		$isValid = false;
		echo $outputError;
	} else {
	
	
	
		$from = 'noreply@swbiblechapel.org';
		$to = 'secretary@swbiblechapel.org';
		$headers = array('From'=>$from, 'Subject'=>'Membership Application for ' . $membershipName);
		$message = 'Name: ' . $membershipName . "\r\n" .
					"\r\n" . 'Address Line 1: ' . $membershipAddress . "\r\n" . 'City: ' . $membershipCity .
					"\r\n" . 'State: ' . $membershipState . "\r\n" . 'Zip Code: ' . $membershipZip .
					"\r\n" . 'Phone Number: ' . $membershipPhone . "\r\n" . 'Email: ' . $membershipEmail .
					"\r\n" . 'Testimony: ' . $membershipTestimony . "\r\n" . 'Have you been baptised?' . $membershipBaptism . "\r\n";
		if($baptized == true){
			$message .= 'Date of baptism: ' . $baptismDate . "\r\n";
		} else {
			$message .= "\r\n";
		}
		
		$message .= 'Are you currently a member at another church? ' . $memberChurch . "\r\n";
		if($currentMember == true){
			$message .= 'Church Name: ' . $currentChurchName . "\r\n" . 'Church Address: ' . $currentChurchAddress .
						"\r\n" . 'Church City: ' . $currentChurchCity . "\r\n" . 'Church State: ' . $currentChurchState .
						"\r\n" . 'Church Zip Code: ' . $currentChurchZip . "\r\n";
		} else if($currentMember == false) {
			$message .= 'Church Name Last Affiliated With: ' . $affiliationChurchName . "\r\n" . 'Church Address: ' . $affiliationChurchAddress .
						"\r\n" . 'Church City: ' . $affiliationChurchCity . "\r\n" . 'Church State: ' . $affiliationChurchState .
						"\r\n" . 'Church Zip Code: ' . $affiliationChurchZip . "\r\n";
		}
		
		$message .= 'Do you agree, without reservation, to the Church Constitution? ' . $agreeConstitution . "\r\n";
		$message .= 'Do you agree with the basic doctrine that we as the body of Christ hold to, as outlined within the Church Constitution? ' . $agreeDoctrine . "\r\n";
		$message .= 'Will you promise to fulfill the Church covenant (as stated in Article III of the Church Constitution) and uphold the doctrines of the Bible as a member of this Church in the strength that God gives you? ' . $fulfillCovenant . "\r\n";
		
		
		if (!filter_var($membershipEmail, FILTER_VALIDATE_EMAIL)){
			echo 'emailerror';
		} else if ($isValid) {
			if ($mail->send($to, $headers, $message)) { 
				echo $membershipName;
			} else { 
				echo 'error'; 
			} 
		}
	}

?>