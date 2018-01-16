<?php

$id= $_POST['mb_id'];
include ("../mysql.php");   //   open database and assigns $resid which is database connector
$query="delete from MessageBox where mb_id='".$id."'";
$check=MySQLi_Query($resid, $query);


if ($check){
		echo 'Record is deleted.';
}
else
{
		 echo 'Record is not deleted.';

} 
$resid -> close(); 
?>