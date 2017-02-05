<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$dbname = "db321";

	$conn = new mysqli($hostname, $username, $password, $dbname);

	// Check connection
if ($conn->connect_error) {
    die("Connection to mysql failed: " . $conn->connect_error);
}

echo "Connected successfully";

$conn->close();
	
	
?>

