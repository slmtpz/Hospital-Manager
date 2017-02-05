<?php
	session_start();

if(isset($_SERVER['HTTP_REFERER'])) {
				if($_SERVER["HTTP_REFERER"]=="https://localhost/cmpe321project3/login_patient_page.php"){
					$uname = $_POST["user_name"];
					$pass = $_POST["password"];
				}	
	
		}else{
		
			if(isset($_SESSION['user_name']) and isset($_SESSION['password']) ){
				$uname= $_SESSION['user_name'];
				$pass= $_SESSION['password'];

			}else{
			
				?>Unauthorized entrance is detected. Make sure that you login to the system properly.<?php
				exit;
			}
		}

	include 'common.php';
	include 'connect.php';
	 if ($_POST['user_name']=='' or $_POST['FormBranch']=='') {
		
error('One or more required fields were left blank.\n'.
'Please fill them in and try again.');
}

$hostname = "localhost";
$username = "root";
	$password = "";
	$dbname = "db321";

	$conn = new mysqli($hostname, $username, $password, $dbname);

	// Check connection
if ($conn->connect_error) {
    die("Connection to mysql failed: " . $conn->connect_error);
}

	$sql= "CREATE TABLE IF NOT EXISTS doctor (
    User_Name VARCHAR(100) ,
    Branch VARCHAR(100),
    PRIMARY KEY  (`User_Name`,`Branch`)
)";

	$conn->query($sql);
	
	

	$sql = "INSERT INTO doctor VALUES(
	'$_POST[user_name]','$_POST[FormBranch]')";
	
	$conn->query($sql);


	

?>		 

