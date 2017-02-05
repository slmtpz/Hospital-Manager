<html>
    <head>
	<title>CMPE 321 PROJECT 3</title>
</head>
    <body bgcolor="DarkSalmon">
	
<?php  


	session_start();

	
if(isset($_SERVER['HTTP_REFERER'])) {
				if($_SERVER["HTTP_REFERER"]=="https://localhost/cmpe321project3/ops_patient.php"){
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
	
	
	
	
	
    $branches = array();
	$doctors = array();
	
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


				error_reporting( error_reporting() & ~E_NOTICE );

				
                    			
						$_SESSION['branch'] = $_POST['Branch'];
						$_SESSION['docname'] = $_POST['Doctor'];
					    
							
?>

<h3>Arrange Appointment</h3>
<p>Please select a branch, select a doctor, select a date and time to arrange an appointment. </p>



<form id="myform" method="post">

			<table border="0" cellpadding="0" cellspacing="5">
<tr>
<td>Select Branch:</td>
<td>
<select name="Branch"   onchange="change1()">
    <option><?php echo $_SESSION['branch']?></option>
    <?php
                    foreach ($branches as $branch) {
                        echo "<option value='$branch'>" . $branch . " </option>";
                    }
                ?>
</select>
</td>
</tr>
<tr><td>Select Doctor Name:</td><td>
<select name="Doctor" onchange="change2()">
     <option><?php echo $_SESSION['docname']?></option>
    <?php
					        $sql= "SELECT * FROM doctor WHERE Branch='$_POST[Branch]'";
							$result = $conn->query($sql);
                    foreach ($result as $name=>$row) {
                        echo "<option value='$row[User_Name]'>" . $row['User_Name'] . " </option>";
                    }
                ?>
</select></td></tr></table>






</form>

<script>
function change1(){
   
	document.getElementById("myform").submit();
	
}
</script>


<script>
function change2(){
    
	document.getElementById("myform").submit();
	
}
</script>



<table>

		<form method="post" action="appointment_arrange_bh.php">
			<table border="0" cellpadding="0" cellspacing="5">
				
				
				<tr>
					<td>Enter Date(Y-M-D):</td>
					<td><input type='text' name='date' id='date'  maxlength="10" required/>

					</td>
					
				</tr>
				
				
				
			<tr>
					<td>Select Time :</td><td>
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
			<input type='button' name='Home' value='Home' onclick="parent.location='home.php'"/>
        <input type="submit" name="submit" value="Arrange" />

      </td>
				</tr>
			</table>
		</form>   </body>
</html>
 