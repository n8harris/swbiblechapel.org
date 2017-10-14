<?php
if(isset($_POST['adminType']) && $_POST['adminType'] == 'create'){
	if($_POST['user-name'] == 'adminRundgren' && $_POST['password'] == '%Garlic123'){
		session_start();
		$_SESSION['logged-in'] = true;
		echo 'loggedInCreate';
	} else {
		echo 'errorLogin';
	}
} else if (isset($_POST['adminType']) && $_POST['adminType'] == 'edit'){
	if($_POST['user-name'] == 'adminRundgren' && $_POST['password'] == '%Garlic123'){
		session_start();
		$_SESSION['logged-in'] = true;
		echo 'loggedInEdit';
	} else {
		echo 'errorLogin';
	}
} else {
	echo 'error';
}
?>