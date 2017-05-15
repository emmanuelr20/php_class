<?php

	class Connection
	{
		
		public static function make()
		{
			$servername = "localhost";
			$username = "root";
			$password = "";

			try {
			    $conn = new PDO("mysql:host=$servername;dbname=todos", $username, $password);
			    return $conn;
			} catch(PDOException $e) {
				echo $e->getMessage();
			}
		}
	}
?>