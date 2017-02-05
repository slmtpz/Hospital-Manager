<html>
    <head>
	<title>CMPE 321 PROJECT 3</title>
</head>
    <body bgcolor="DarkSalmon">
<?php

session_start();
if(isset($_SERVER['HTTP_REFERER'])) {
				if($_SERVER["HTTP_REFERER"]=="https://localhost/cmpe321project3/login_admin_page.php"){
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

?>


		<p><p/>
		<h3>Delete a doctor</h3>

		<p><p/>
		<form method="post" action="doctor_delete_bh.php">
			<table border="0" cellpadding="0" cellspacing="5">
				
				<tr>
					<td>Select Doctor to Delete:</td><td>
					<select name="FormBranch">
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
							$sql= "SELECT * FROM  doctor ";
							$result = $conn->query($sql);
							foreach($result as $name=>$row) {
							?><option value="<?php echo $row['User_Name'];?>"Name:><?php echo $row['User_Name']?></option>
							<?php
							}
							?>
						
						
					</select>					       
					</td>
				</tr>
				
				
				
				
				</tr>
				
				
				
				
				
				
				<tr>
					 <td align="right" colspan="2">

        <br>

		<input type='button' name='home' value='Home'onclick="parent.location='home.php'"/>

        <input type="submit" name="submit" value="Delete" />

      </td>
				</tr>
			</table>
		</form>
		
		
    </body>
</html>
 