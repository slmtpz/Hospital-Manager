   <head>
	<title>CMPE 321 PROJECT 3</title>
</head>
   <body bgcolor="DarkSalmon">
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
	 if ($_POST['FormTime']=='' or $_POST['date']=='') {
		
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
	
	$sql= "CREATE TABLE IF NOT EXISTS appointment (
	User_Name VARCHAR(100),
	Branch VARCHAR(100),
    doctor VARCHAR(100),
	date VARCHAR(100),
    time VARCHAR(100)

)";
			$conn->query($sql);

			
			
			$sql= " SELECT *  FROM appointment WHERE 
	Branch='$_SESSION[branch]' AND
    doctor='$_SESSION[docname]' AND
	date='$_POST[date]' AND
    time='$_POST[FormTime]'";
	
				$result=$conn->query($sql);

				 if ($result->num_rows > 0) { 
					error('This doctor has another appointment in the selected time.');
				 }
	
	
		$sql = "INSERT INTO appointment VALUES('$_SESSION[user_name]','$_SESSION[branch]','$_SESSION[docname]','$_POST[date]','$_POST[FormTime]')";
		$conn->query($sql);


	

	

?>		 
  <p></p>
		    <input type='button' name='Home' value='Home' onclick="parent.location='Home.php'"/> 
			<p></p>
  </body>
  