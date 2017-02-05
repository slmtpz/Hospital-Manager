<html>
    <head>
	<title>CMPE 321 PROJECT 3</title>
</head>
    <body bgcolor="DarkSalmon">
    
    <?php
    	// Starting session
    	session_start();
    
    	$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "db321";
        $uname=" ";
		$pass=" ";
		if(isset($_SERVER['HTTP_REFERER'])) {
				if($_SERVER["HTTP_REFERER"]=="http://localhost/cmpe321project3/login_patient_page.php"){
					$uname = mysql_escape_string ($_POST["user_name"]);
					$pass = mysql_escape_string ($_POST["password"]);
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

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }else{
			
            // Fetch the user
            $sql = "SELECT User_Name FROM user WHERE User_Name = '" . $uname . "' AND Password = '" . $pass . "'";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {            	
            	$row = $result->fetch_assoc();
            	
            	// Setting a session variable
                $_SESSION["user_name"] = $uname;
				$_SESSION["password"] = $pass;

             ?>   
             <h3>Welcome, <b><?php echo $_SESSION["user_name"]; ?></b></h3> 
			<p>Please select an operation to perform:</p>
				<label for="b1"><b>Arrange an appointment with a doctor:</b></label>
			<a href='appointment_arrange.php?link=<?php echo $uname; ?>'> <input type='button' name='add_appointment' value='Arrange' onclick="parent.location='appointment_arrange.php'"/> </a>
							<br><br><label for="b1"><b>Modify an already existing appointment:</b></label>

			<a href='appointment_modify.php?link=<?php echo $uname; ?>'> <input type='button' name='modify_appointment' value='Modify' onclick="parent.location='appointment_modify.php'"/> </a>
			<br>	<br>			<label for="b1"><b>Cancel an already existing appointment:</b></label>
			<a href='appointment_cancel.php?link=<?php echo $uname; ?>'> <input type='button' name='cancel_appointment' value='Cancel' onclick="parent.location='appointment_cancel.php'"/> </a>
			<p></p>
			<input type='button' name='Back' value='Back' onclick="parent.location='login_patient_page.php'"/>

			<?php	
            } else {
				
                echo "Wrong username or password. Please check your credentials.";
            }
        }
        
        $conn->close();

	?>

    </body>
</html>
