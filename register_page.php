<html>
<head>
	<title>CMPE 321 PROJECT 3</title>
</head>

<body bgcolor="DarkSalmon">

  <h3>Patient Registration Page</h3>

  <p>Please enter your user name and password.</p>

  <form method="post" action="register.php">

    <table border="0" cellpadding="0" cellspacing="5">

      <tr>

        <td align="right">

          <p>User Name</p>

        </td>

        <td>

          <input name="user_name" type="text" maxlength="100" size="25" />


       </td>

    </tr>

    
    <tr>

      <td align="right">

        <p>Password</p>

      </td>

      <td>

        <input name="password" type="password" maxlength="100" size="25" />


      </td>

    </tr>



    <tr>

      <td align="right" colspan="2">
	  <br>
		<input type='button' name='Home' value='Home' onclick="parent.location='Home.php'"/> 
        <input type="submit" name="submitok" value="Submit" />
		
      </td>

    </tr>

  </table>

</form>

</body>
</html>





