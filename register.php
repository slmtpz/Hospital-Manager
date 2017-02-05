 <body bgcolor="DarkSalmon">
 <?php
	include 'common.php';
	include 'connect.php';
	 if ($_POST['user_name']=='' or $_POST['password']=='') {
		
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

	$sql= "CREATE TABLE IF NOT EXISTS user (
    User_Name VARCHAR(100) ,
    Password VARCHAR(100),
    PRIMARY KEY  (`User_Name`)
)";

	$conn->query($sql);
	

	$sql = "INSERT INTO user SET
	User_Name = '$_POST[user_name]',
	Password = '$_POST[password]'";
	
	$conn->query($sql);


	

?>		 
<p></p>
		    <input type='button' name='Home' value='Home' onclick="parent.location='Home.php'"/> 
			<input type='button' name='Back' value='Back' onclick="parent.location='register_form.php'"/>
			<p></p>
			</body>
  
