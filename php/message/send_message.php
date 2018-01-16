<!doctype html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel='stylesheet' href='page_css.css'>
	<title> Messaging System</title>
	
		<script src='jquery.js'></script>

		<script type='text/javascript'>
			function sec() {
				var f_email=document.f1.n1.value;
				var f_message=document.f1.t1.value;
				f_message = f_message.trim();

				if(f_email.length==0) {
			s1.innerHTML="<font color='red'>Field is Required</font>";
				}
				else if(f_message.length==0) {
			s1.innerHTML="<font color='red'>Please add some message</font>";
				}

			else if(f_email.length>50||f_message.length>500) {
				if(f_email.length>50) {
				s2.innerHTML="<font color='red'>Characters should be less than 50 </font>";
				}

				if(f_message.length>500) {
				s3.innerHTML="<font color='red'>Characters should be less than 500 </font>";
				}

			}
				else {
					document.f1.submit();
				}
			} 

		</script>
	
</head>
<body>
		<table cellpadding='3' cellspacing='3' class='tab_main'>

			<!--Nav_Tabs-->
			<tr align='center' bgcolor='lightgrey' class='td_bor'>
				<td width='5%'> <?php Session_start(); if(IsSet($_SESSION["user_id"])) {echo "<a href='../user_page.php'>"; } else {echo "<a href='../home.php'>";}?>Home </a></td>
				<td width='5%'> <a href='inbox.php'>Inbox (Only Recent Message)</a></td>
				<td width='5%'> <a href='user_list.php?arg1=0'>User List </a></td>
				<td width='5%'> <a href='../login/signout.php'>Signout </a></td>

			</tr>
			
			<tr>
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 
				<td> <hr> </td> 

			</tr>

			<tr align='center'> 
				<td colspan='5'>
					<form method='POST' name='f1' action='saveMessage.php'>
						<table>
							<tr>
								<td> User's Email: </td> <td> <input type='email' name='email' id='email' maxlength='50' 
																	  value = 
																	  	'<?php	
				
																			if (isset($_GET["arg1"])) { $useridSent= $_GET["arg1"];}
																			if (isset($useridSent)) {
//																				echo $useridSent;
																				include("../mysql.php");
																				$query="select user_email from Users where user_id= $useridSent";

																				$check=MySQLi_Query($resid, $query);
																				$r_record=MySQLi_Fetch_Row($check);
																				if ($r_record)
																				    {
																						echo $r_record[0];																					
																				    }
																				}
									
																		?>'
																	  > </td> <td> <span id='s1'> </span> </td> <td> <span id='s2'> </span> </td>
							</tr>
							<tr>
								<td> Message: </td> <td> <textarea rows='10' cols='32' maxlength='500' name='msg' id='msg'  autofocus> </textarea> </td> <td> <span id='s3'> </span> </td> <td> <span id='s4'> </span> </td>
							</tr>
							
							<tr>
								<td> <br> <input type='submit' > </td>

							</tr>
							<input type="hidden" id="userid" name="userid" value = "<?php  if (isset($_GET['arg1'])) { echo $_GET['arg1'];}?>"/>
						</table>
					</form>
				</td>
			</tr>
			
		<?php
			if(! IsSet($_SESSION["user_id"])) { Header("Location :../home.php"); return;}
		?>
		</table>
			<footer align='center'>
			&copy; All Rights Reserved.	
			</footer>
</body>
</html>
