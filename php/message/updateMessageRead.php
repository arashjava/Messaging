<?php


$id= $_POST['mb_id'];
$read= $_POST['has_read'];
//echo $read;
//return;

include ("../mysql.php");   //   open database and assigns $resid which is database connector
$query="update MessageBox set has_read=$read
            where mb_id='".$id."'";
$check=MySQLi_Query($resid, $query);


if ($check){ 
//	    if ($read==true) { $msg='Record is marked as read.' ;}
//		else { $msg='Record is marked as unread.' ;}
//		echo json_encode(array('result' => $read));
	    echo $read;
}
else
{
//		echo json_encode(array('result' => 2));

} 
$resid -> close();  

?>