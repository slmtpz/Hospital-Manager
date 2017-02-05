<html>
    <head>
	<title>CMPE 321 PROJECT 3</title>
</head>
    <body bgcolor="DarkSalmon">
<?php
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
		<p><b>Edit Branch<b/></p>

		<p><p/>
		<form method="post" action="branch_edit_bh.php">
			<table border="0" cellpadding="0" cellspacing="5">
				
				<tr>
					<td>Select Branch To Edit:</td><td>
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
							$sql= "SELECT * FROM branch ";
							$result = $conn->query($sql);
							foreach($result as $name=>$row) {
								 echo $row['name']
							?><option value="<?php echo $row['name'];?>"Name:><?php echo $row['name']?></option>
							<?php
							}
							?>
						
						
					</select>					       
					</td>
				</tr>
				
				
				<tr>
					<td>Change Branch as:</td>
					<td><input type='text' name='branch' id='branch'  maxlength="32" required/>

					</td>
					
				</tr>
				
				
				
				
				
				
				<tr>
					 <td align="right" colspan="2">

      <br>

		<input type='button' name='home' value='Home'onclick="parent.location='home.php'"/>

        <input type="submit" name="submit" value="Edit" />

      </td>
				</tr>
			</table>
		</form>
		
		
    </body>
</html>
 