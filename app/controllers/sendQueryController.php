<?php
	require_once("../models/PatientQuery.php");

	if(isset($_POST['fullName'], $_POST['email'], $_POST['mobileNumbers'], $_POST['message'])){
		$patientQuery = new PatientQuery();

		$patientQuery->setProperties($_POST['fullName'], $_POST['email'], $_POST['mobileNumbers'], $_POST['message']);
		$result = $patientQuery->save();
				
		if($result){
			$name = "success";
			$message = "Message sent! Expect our Admin to contact you soon.";
		}else{
			$name = "error";
			$message = "An error has occured! Please try again later.";
		}					
	}else{
		$name = "error";
		$message = "Please fill in all fields!";
	}

	setcookie($name, $message, time() + 2, '/');
?>