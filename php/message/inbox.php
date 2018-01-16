<!doctype html>
<html>
<head>
	<link rel='stylesheet' href='/messaging/css/main.css'>
	<script type="text/javascript" src="/messaging/js/jquery.js"></script>
	<title> Messaging System </title>
</head>
<body>
	<script>
	function deleteIt(id){
		
		var r= confirm("Are you sure to delete this message?")
		if (r==true)
		{	
			$.post('deleteMessage.php', {mb_id: id},
				   function(data)
				   {
						alert(data);
						location.reload();
					});
		}
	}		
		
		function readIt(id, counter){
			var checkboxid = "hasread"+counter;
			var msg = "msg"+counter;
			var hasread = $('#' + checkboxid).is(":checked");
//			alert(hasread);
			$.post('updateMessageRead.php', {mb_id: id, has_read: hasread},
					function(data){
	    					$('#'+checkboxid).value=data;
							location.reload();
						});

		}
	</script>
		<table cellpadding='3' cellspacing='3' class='tab_main'>
			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a href='../user_page.php'>"; } else {echo "<a href='../home.php'>";}?>Home </a></td>
				<td width='5%'> <a href='inbox.php'>Inbox </a></td>
				<td width='5%'> <a href='user_list.php?arg1=0'>User List</a></td>
				<td width='5%'> <a href='../login/signout.php'>Signout </a></td>

			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 

			</tr>
			
			<?php
			//Session_start();
			if(IsSet($_SESSION["user_id"])) {
				$userid=$_SESSION["user_id"];
				$query="select mm.mb_from_userid, mm.mb_to_userid, mm.mb_text, mm.mb_time , u.user_name, mm.mb_id, mm.has_read
				        from MessageBox mm, Users u 
						where u.user_id= mm.mb_from_userid and mb_to_userid=".$userid." order by mb_time";
				include("../mysql.php");   // will return $resid for sql connection
				$result=MySQLi_Query($resid,$query);

				$counter=1;
				$line="----------------------------------------------------------------------------------";
				echo "<tr align='center'> <td colspan='5'> <table cellpadding='4' cellspacing='5' width='100%' style='table-layout:fixed'> <col width='100%'> </td> </tr>";
				while(($data=MySQLi_Fetch_Row($result))==True)
				{
					$checkboxName="hasread".$counter;
					$buttonName="delete".$counter;
					if ($data[6]) {
						$txt= "<strike>".$data[2]."</strike>";
						$checked="checked";}
					else{
						$txt= "<b>".$data[2]."</b>";
						$checked="";
					}
					echo "<tr><td>$counter- Mark as Read<input type='checkbox' name=$checkboxName id=$checkboxName $checked onchange='readIt($data[5], $counter)' /> 
					                              
					&nbsp&nbsp&nbsp&nbsp&nbsp From/ Time: <font color='blue'>".$data[4]." </font> [ID= ".$data[0]."]/ @ ".$data[3]." </td>";
					echo "<tr> <td style='word-wrap:break-word' >Message: $txt";
//					if ($data[6]) {echo "<strike>".$data[2]."</strike>";}
//					else {echo "<b>".$data[2]."</b>";}
					echo "</td> </tr>";
					echo " <td><button type='button' name=$buttonName onclick='deleteIt($data[5])' >Delete</button></td>";
					echo "<tr> <td> $line </td></tr>";

					$counter++;
				}
				echo "</table> ";
				MySQLi_Close($resid);

			}
			else {
				echo "<tr align='center'> <td colspan='5'> <font color='red'> Sorry, You not Logged in! </font> Login again:- <a href='../login/login.php'>Login</a> </td> </tr>";

			}
			
			?>
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	
			</footer>
</body>
</html>
		
		
