<!doctype html>
<html>
<head>
	<style>
		.redtext{
			color:red;
		}
		
	</style>
	<link rel='stylesheet' href='/messaging/css/main.css'>
	<title> User Login</title>
</head>
<body>
		<table cellpadding='3' cellspacing='3' class='tab_main'>

			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'> <a href='home.php'> Home </a></td>
				<td width='5%'> <a href='./login/login.php'>Login </a></td>
				<td width='5%'> <a href='./login/secure_signup.php'>Sign-up </a></td> 
			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
			</tr>
			
			<tr>
				<td colspan='4'> 
					<p> 
					      <h3 class=redtext> <?php if(!empty($_GET['param']) && $_GET['param']=="1") echo 'You are not logged-in yet!'  ?></h3>
						  <h3>Welcome to our Home Page</h3>
					</p>
	
				</td>
			</tr>
		</table>
		<footer align='center'>
			&copy; All Rights Reserved.	
		</footer>
</body>
</html>
