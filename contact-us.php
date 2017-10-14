<?php


	
	include('Mail.php');
    $mail =& Mail::factory("mail");

	
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$name = $_POST['name'];
	$message = $_POST['message'];
	$to = $_POST['contact'];
    $headers = array('From'=>$email, 'Subject'=>$subject);
    
    			
	if($name == '' || $email == '' || $message == '' || $to == '' || $subject == ''){
		echo 'nofill';
		
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
		echo 'emailerror';
	}
	else {	
			if ($mail->send($to, $headers, $message)) { 
				echo $name;
			} else { 
				echo 'error'; 
			} 
	}

?>