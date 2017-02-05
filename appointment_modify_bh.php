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
	 if ($_POST['FormBranch']=='') {
		
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
	$arr = explode(" ", $_POST['FormBranch']);

echo $_POST['FormBranch'];

$sql= " SELECT *  FROM appointment WHERE 
	Branch='$_POST[branch]' AND
    doctor='$_POST[docname]' AND
	date='$_POST[date]' AND
    time='$_POST[FormTime]'";
	
				$result=$conn->query($sql);

				 if ($result->num_rows > 0) { 
					error('Oooops! This doctor has another appointment in that date and time.');
				 }




	$date=$arr[0];
	$time=$arr[1];
	$branch=$arr[2];
	$doctor=$arr[3];
	$sql = "UPDATE appointment SET date='$_POST[date]',doctor='$_POST[docname]' ,Branch='$_POST[branch]', time='$_POST[FormTime]' WHERE date='$arr[0]' AND time='$arr[1]' AND Branch='$arr[2]' AND doctor='$arr[3]'";
	echo $sql;
	$conn->query($sql);
	


?>		 
  <p></p>
		    <input type='button' name='Home' value='Home' onclick="parent.location='Home.php'"/> 
			<p></p>
			</body>
  