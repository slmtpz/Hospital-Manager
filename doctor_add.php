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
			
				?>Please log in first.<?php
				exit;
			}
		}

?>



		<p><p/>
		<h3>Add New Doctor</h3>

		<p>Please specify the name of the doctor and select a branch to add a new doctor.<p/>
		<form method="post" action="doctor_add_bh.php">
			<table border="0" cellpadding="0" cellspacing="5">
				<tr>
					<td>Doctor Name:</td>
					<td><input type='text' name='user_name' id='user_name'  maxlength="32" required/>

					</td>
					
				</tr>
				<tr>
					<td>Select Branch:</td><td>
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
							$sql= "SELECT name FROM branch";
							$result = $conn->query($sql);
							foreach($result as $name=>$row) {
								 echo $row['name']
							?><option value="<?php echo $row['name']?>"><?php echo $row['name']?></option>
							<?php
							}
							?>
						
						
					</select>					       
					</td>
				</tr>
				<tr>
					 <td align="right" colspan="2">

<br>
		<input type='button' name='home' value='Home'onclick="parent.location='home.php'"/>

        <input type="submit" name="submit" value="Add" />

      </td>
				</tr>
			</table>
		</form>
		
		
    </body>
</html>
