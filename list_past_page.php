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
  


	
    $branches = array();
	
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
						
foreach($result as $name=>$row ){
    $branches[] = $row['name'];
}


				
				
			    
?>

<h3>List Past Appointments</h3>
<p>Please specify branch to see past appointments.If you want to see for all of branches, please select 'All'.</p>
  
<form method="post" action="list_past.php">
Select Report Type
<select name="Branch">
    <option>All</option>
    <?php
                    foreach ($branches as $branch) {
                        echo "<option value='$branch'>" . $branch . " </option>";
                    }
                ?>
</select>

				
				
				<tr>
					 <td align="right" colspan="2">

<br><br>
		    <input type='button' name='Home' value='Home' onclick="parent.location='Home.php'"/> 

        <input type="submit" name="submit" value="List" />

      </td>
				</tr>
			</table>
		</form>
 </body></html>