<!DOCTYPE html>
<html>
 <head>
        <title>Attendance System Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/bootstrap.min.js"></script>
    </head>

<body id = "body_bg">
<div align="center">
<br>
<br>
	<h3>Attendance System Login</h3>
		<form id="login-form" method="post" action="login_authenticate.php">
			<table border="0.5">
				<br>
				<tr>
					<td><label for="user_id">User Name</label></td>
					<td><input type="text" name="user_id" id="user_id"></td>
				</tr>
				<br>
				<tr>
					<td><label for="user_pass">Password</label></td>
					<td><input type="password" name="user_pass" id="user_pass"></td>
				</tr>
				<tr>
					<td><input type="submit" value="Submit"></td>
					<td><input type="reset" value="Reset"></td>
				</tr>
			</table>
		</form>
</div>
</body>

</head>
</html>
