 <html>  <head>
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

?>


  
		<h3>Modify Appointnment</h3>
<p>Please select an appointment to edit. After you selected an appointment, you should edit all the fields. </p>
		<p><p/>
		<form method="post" action="appointment_modify_bh.php">
			<table border="0" cellpadding="0" cellspacing="5">
				
				<tr>
					<td>Select Appointnment to Edit:</td><td>
					<select name="FormBranch">
						<?php
		                    session_start();				
       						$hostname = "localhost";
							$username = "root";
							$password = "";
							$dbname = "db321";

							$conn = new mysqli($hostname, $username, $password, $dbname);

							// Check connection
						if ($conn->connect_error) {
								die("Connection to mysql failed: " . $conn->connect_error);
						}
							$sql= "SELECT * FROM  appointment WHERE User_Name='$_SESSION[user_name]' ";
							$result = $conn->query($sql);
							foreach($result as $name=>$row) {
							?><option value="<?php echo $row['date']; ?> <?php echo $row['time'];?> <?php echo $row['Branch'];?> <?php echo $row['doctor'];?>"> Date: <?php echo $row['date']; ?> Time: <?php echo $row['time'];?> Branch: <?php echo $row['Branch'];?> Doctor: <?php echo $row['doctor'];?></option>
							<?php
							}
							?>
						
						
					</select>					       
					</td>
				</tr>
				
				
				
			
	

      <tr>

        <td align="right">

          <p>New Branch</p>

        </td>

        <td>

          <input name="branch" type="text" maxlength="100" size="25" required />


       </td>

    </tr>

    
    <tr>

      <td align="right">

        <p>New Doctor</p>

      </td>

      <td>

        <input name="docname" type="text" maxlength="100" size="25" required />


      </td>

	  
    </tr>
	
	
	
	<tr>

      <td align="right">

        <p>New Date(Y-M-D)</p>

      </td>

      <td>

        <input name="date" type="text" maxlength="100" size="25" required />


      </td>

    </tr>
	
	
	
	
	<tr>
				 <td align="right">

                <p>New Time</p>
					</td><td>
					<select name="FormTime">
						<?php	

							for($i=8;$i<17;$i=$i+1) {
								for($j=00;$j<60;$j=$j+5) {
							?><option value="<?php echo sprintf("%02d", $i);?>:<?php echo sprintf("%02d", $j);?>"><?php echo sprintf("%02d", $i);?>:<?php  echo sprintf("%02d", $j);?></option>
							<?php
							}
						}
							?>
						
						
					</select>					       
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
  