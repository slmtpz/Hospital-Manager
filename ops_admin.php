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
				if($_SERVER["HTTP_REFERER"]=="http://localhost/cmpe321project3/login_admin_page.php"){
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
            $sql = "SELECT User_Name FROM admin WHERE User_Name = '" . $uname . "' AND Password = '" . $pass . "'";
            
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {            	
            	$row = $result->fetch_assoc();
            	
            	// Setting a session variable
                $_SESSION["user_name"] = $uname;
				$_SESSION["password"] = $pass;
              
					?>
					
			<h3>Welcome, <b><?php echo $_SESSION["user_name"]; ?></b></h3> 

			<p>Please select an operation to perform:</p>
				<label for="b1"><b>Add a new doctor to the system:</b></label>
			<input type='button' name='addD' value='Add New Doctor' onclick="parent.location='doctor_add.php'"/>
				<br><br><label for="b1"><b>Edit an already existing doctor:</b></label>
			<input type='button' name='edtD' value='Edit A Doctor' onclick="parent.location='doctor_edit.php'"/>
				<br><br><label for="b1"><b>Delete a doctor from the system:</b></label>
			<input type='button' name='delD' value='Delete A Doctor' onclick="parent.location='doctor_delete.php'"/>
				
				<br><br><label for="b1"><b>Add a new branch to the system:</b></label>
			<input type='button' name='addD' value='Add New Branch' onclick="parent.location='branch_add.php'"/>
				<br><br><label for="b1"><b>Edit an already existing branch:</b></label>
		    <input type='button' name='edtD' value='Edit Branch' onclick="parent.location='branch_edit.php'"/>
				<br><br><label for="b1"><b>Delete a branch from the system:</b></label>
			<input type='button' name='delD' value='Delete A Branch' onclick="parent.location='branch_delete.php'"/>
<br><br><label for="b1"><b>List all past appointments:</b></label>
			<input type='button' name='lisD' value='List Past Appointments' onclick="parent.location='list_past_page.php'"/>
				<br><br><label for="b1"><b>List all future appointments:</b></label>
		    <input type='button' name='lisD' value='List Future Appointments' onclick="parent.location='list_future_page.php'"/>
				<br><br>	<input type='button' name='home' value='Home'onclick="parent.location='home.php'"/>

			<?php
			  
			  
			  
				
            } else {
				echo $_SESSION["user_name"];
				echo $_SESSION["password"];
                echo "Wrong username or password. Please check your credentials.";
            }
        }
        
        $conn->close();

	?>

    </body>
</html>