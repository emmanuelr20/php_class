<?php
	$servername = "localhost";
	$username = "root";
	$password = "";

	try {
	    $conn = new PDO("mysql:host=$servername;dbname=switch", $username, $password);
	    // set the PDO error mode to exception
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $sql = "SELECT * FROM fellows";
	    // use exec() because no results are returned
	    $stmt = $conn->prepare($sql);
	    $stmt->execute();
	    $fellows =$stmt->fetchAll();
	    //echo "Database created successfully<br>";
	    //$fellows = $fellows->fetchAll();
	    echo var_dump($fellows);
	    }
	catch(PDOException $e)
	    {
	    echo $sql . "<br>" . $e->getMessage();
	    }

	$conn = null;
?>