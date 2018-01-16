<?php

Session_start();
if(! IsSet($_SESSION["user_id"])) { Header("Location :../home.php"); return;}


if($_SERVER["REQUEST_METHOD"]=="POST") {
	$email=$text="";
	function sec($data) {
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
	

	
	
	$useridReceiver=sec($_POST['userid']);
	$emailTo=sec($_POST['email']);
	$text=sec($_POST['msg']);

	include('../mysql.php');   //  Will return $resid as database connector
		$query="select user_id from Users where user_email='".$emailTo."'";

		$check=MySQLi_Query($resid,$query);
	
		$useridCheck=MySQLi_Fetch_Row($check);
		$senderid= $_SESSION["user_id"];
		if($useridCheck) {
				$receiverId=$useridCheck[0];

				$query="insert into MessageBox (mb_from_userid, mb_to_userid, mb_text, mb_time)
				          values ($senderid,$receiverId,'".$text."', SYSDATE())";

				$res=MySQLi_Query($resid,$query);

				if($res) {
					$success=1;   //  success to send the message

				}

			else {
				 $success=2;  //  failure to send the message

			}

		}
			else{
								 $success=2;  //  failure to send the message
			}
		MySQLi_Close($resid);
		header("Location: user_list.php?arg1=$success"); 
		return;
}
?>

