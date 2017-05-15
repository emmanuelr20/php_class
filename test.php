
<!DOCTYPE html>
<html>
	<body>

		<form action="fileUpload.php" method="post" enctype="multipart/form-data">
		    Select image to upload:
		    <input type="file" name="fileToUpload" id="fileToUpload">
		    <input type="submit" value="Upload Image" name="submit">
		</form>
		<?php
		// $cookie_name = "user";
		// $cookie_value = "John Doe";
		// setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
		?>

		<?php
		// if(!isset($_COOKIE[$cookie_name])) {
		// 	echo "Cookie named '" . $cookie_name . "' is not set!";
		// } else {
		// 	echo "Cookie '" . $cookie_name . "' is set!<br>";
		// 	echo "Value is: " . $_COOKIE[$cookie_name];
		// 	echo var_dump($_COOKIE);
		// }
		?>
		<?php
			// $str = "<h1>Hello World!</h1>";
			// $newstr = filter_var($str, FILTER_SANITIZE_STRING);
			// echo $newstr;
		?>
		<?php
		$str = "<h1>Hello WorldÆØÅ!</h1>";

		$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		echo $newstr;
		?>
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = new mysqli($servername, $username, $password);

		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 
		echo "Connected successfully";
		?>
	</body>
	
</html>
