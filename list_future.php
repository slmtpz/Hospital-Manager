<html>
    <head>
	<title>CMPE 321 PROJECT 3</title>
</head>
    <body bgcolor="DarkSalmon"> 
 <?php
	session_start();
	

			if(isset($_SESSION['user_name']) and isset($_SESSION['password']) ){
				$uname= $_SESSION['user_name'];
				$pass= $_SESSION['password'];
			}else{
			
				?>Unauthorized entrance is detected. Make sure that you login to the system properly.<?php
				exit;
			}
	include 'common.php';
	include 'connect.php';
	 if ($_POST['Branch']=='') {
		
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

			$sql="ALTER TABLE appointment CONVERT TO CHARACTER SET latin1 COLLATE 'latin1_swedish_ci'";
			$result=$conn->query($sql);

			
			$sql="CALL listFuture('$_POST[Branch]')";
				$result=$conn->query($sql);
				
				?>
				
				<table>
					<tr>
						<td><b>Patient Name</b><td>
						<td><b>Branch</b><td>
						<td><b>Doctor</b><td>
						<td><b>Date</b><td>
						<td><b>Time</b><td>
					</tr>
					
					<?php
					
					foreach ($result as $name=>$row) { 

						
						?>
						<tr>
							<td><?php echo $row['User_Name'] ?><td>
							<td><?php echo $row['Branch'] ?><td>
							<td><?php echo $row['doctor'] ?><td>
							<td><?php echo $row['date'] ?><td>
							<td><?php echo $row['time'] ?><td>
						</tr>
					
					<?php 
					}
					?>
						
						
	 </body></html>
  