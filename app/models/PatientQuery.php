<?php

	require_once("../config/Database.php");

	class PatientQuery
	{
		private $fullName;
		private $email;
		private $mobileNumbers;
		private $message;
		private $conn;
		private const TABLE = "patient_queries";
		
		/**
		* Get the database connection to use in this model (DI)
		*
		* @return void
		*/
		public function __construct()
		{
			$database = new Database();
			$this->conn = $database->connect();
		}
		
		/**
		* Set the full name property of this model 
		*
		* @param string $fullName
		* @return void
		*/
		public function setFullName($fullName)
		{
			$this->fullName = htmlspecialchars(trim(strtolower($fullName)));
		}

		/**
		* Set the email property of this model 
		*
		* @param string $email
		* @return void
		*/
		public function setEmail($email)
		{
			$this->email = htmlspecialchars(trim(strtolower($email)));
		}

		/**
		* Set the mobile numbers property of this model 
		*
		* @param string $mobileNumbers
		* @return void
		*/
		public function setMobileNumbers($mobileNumbers)
		{
			$this->mobileNumbers = htmlspecialchars(trim($mobileNumbers));
		}

		/**
		* Set the message property of this model 
		*
		* @param string $message
		* @return void
		*/
		public function setMessage($message)
		{
			$this->message = htmlspecialchars(trim($message));
		}

		/**
		* Set the message property of this model 
		*
		* @param string $fullName
		* @param string $email
		* @param string $mobileNumbers
		* @param string $message
		* @return void
		*/
		public function setProperties($fullName, $email, $mobileNumbers, $message)
		{
			$this->setFullName($fullName);
			$this->setEmail($email);
			$this->setMobileNumbers($mobileNumbers);
			$this->setMessage($message);
		}
		
		/**
		* Save the instance in the database
		*
		* @return void
		*/
		public function save()
		{
			if($stmt = $this->conn->prepare("INSERT INTO ".self::TABLE." (full_name, email, mobile_numbers, message) VALUES (?,?,?,?)")) {			
				$stmt->bind_param("ssss", $this->fullName, $this->email, $this->mobileNumbers, $this->message);
				
				return $stmt->execute();
			}else
				echo "Prepare failed: (" . $this->conn->errno . ") " . $this->conn->error;
		}
	}
	
?>