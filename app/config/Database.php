<?php

	class Database
	{
		private const SERVERNAME = "localhost";
		private const USERNAME = "root";
		private const PASSWORD = "";
		private const DBNAME = "mundalamo";
		private $conn;
		
		/**
		* Initialise database connection
		*
		* @return void
		*/
		public function __construct()
		{
			$this->conn = new mysqli(self::SERVERNAME, self::USERNAME, self::PASSWORD, self::DBNAME);
		}
		
		/**
		* Connect to database
		*
		* @return $conn
		*/
		public function connect()
		{
			if ($this->conn->connect_error)
			  die("Connection failed: " . $this->conn->connect_error);
			else
				return $this->conn;
		}
	}
?>