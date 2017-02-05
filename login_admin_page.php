<html>
<head>
	<title>CMPE 321 PROJECT 3</title>
</head>
    <body bgcolor="DarkSalmon">
		<h3>Admin Login</h3>
		<p>Please enter your user name and password.</p>

		<form method="post" action="ops_admin.php">
			<table border="0" cellpadding="0" cellspacing="5">
				<tr>
					<td>User Name:</td>
					<td><input type='text' name='user_name' id='user_name'  maxlength="32" required/>

					</td>
					
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type='password' name='password' id='password' maxlength="32" required/>					       
					</td>
				</tr>
				<tr>
					 <td align="right" colspan="2">

<br>
		<input type='button' name='home' value='Home'onclick="parent.location='home.php'"/>
		<input type='button' name='Back' value='Back' onclick="parent.location='login_page.php'"/>

        <input type="submit" name="submit" value="login" />

      </td>
				</tr>
			</table>
		</form>
		
		
    </body>
</html>