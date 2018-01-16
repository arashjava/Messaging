<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='/messaging/css/main.css'>
	<title> Messaging System </title>
	<script src='/messaging/js/jquery.js'></script>
	<script type="text/javascript" src="/messaging/js/notify.js"></script>
</head>
<body>
		<table cellpadding='3' cellspacing='3' class='tab_main'>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a href='../user_page.php'>"; } else {echo "<a href='../home.php'>";}?>Home </a></td>
				<td width='5%'> <a href='inbox.php'>Inbox </a></td>
				<td width='5%'> <a href='user_list.php'>User List </a></td>
				<td width='5%'> <a href='../login/signout.php'>Signout </a></td>

			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 

			</tr>
<?php
	if (! isset($_SESSION["user_id"])){    //  not allowed to see this page
		header('Location: ../home.php?param=1');
	}
		if ($_GET['arg1']==1)
		{
				?>
						<script>
							$(document).ready(function() {
							  $.notify(
							  "Message Sent!","success");
							});
						</script>
					 <?php
		}
	else if  ($_GET['arg1']==2){
		?>
					<script>
						$(document).ready(function() {
						  $.notify(
						  "Message was not Sent!","error");
						});
					</script>
		<?php
	}
	$user_id = $_SESSION["user_id"];
	include('../mysql.php');   //  Will return $resid as database connector
	if($resid) {
		$count = MySQLi_Query($resid,"select user_name from Users");
		echo "<tr align='center'> <td colspan='5'>Users:- </td> </tr> <tr align='center'> <td colspan='5'><table align='center' >";
		echo " <table align='center' cellspacing='5' cellpadding='5'> 
					<tr> <th> Name: </th> <th> Email: </th> <th> Gender: </th> <th> Location: </th><th> Phone: </th></tr>";
		$query = "select user_name,user_email,user_gender, user_location, user_phone,user_id from Users ";
		$result = MySQLi_Query($resid,$query);
		while(($rows=MySQLi_Fetch_Row($result))==True) 
		{
			if($result) 
			{
				echo "<tr align='center'>";
				echo "<td> $rows[0] </td> 
				<td> 
				    <a href='send_message.php?arg1=$rows[5]' >$rows[1]</a> 
				</td> 
				<td> $rows[2] </td><td> $rows[3] </td><td> $rows[4] </td>";
				echo "</tr>";
			}
		}
		echo "</table> ";
}
	
	
?>
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	
			</footer>
</body>
</html>		
