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
		<p><b>Add New Branch<b/></p>

  <form method="post" action="branch_add_bh.php">

    <table border="0" cellpadding="0" cellspacing="5">

      <tr>

        <td align="right">

          <p>Name</p>

        </td>

        <td>

          <input name="branch" type="text" maxlength="100" size="25" />


       </td>

    </tr>

    

    <tr>

      <td align="right" colspan="2">

        <br>

<input type='button' name='home' value='Home'onclick="parent.location='home.php'"/>

        <input type="submit" name="submitok" value="Add " />

      </td>

    </tr>

  </table>

</form>

</body>
</html>




