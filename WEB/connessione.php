<?php
function connetti_db($NameDB,&$con)
{
	$con=new mysqli("localhost","root","",$NameDB);
	if ($con->connect_errno) 
	echo "Failed to connect to MySQL:(".$con->connect_errno.")".$con->connect_error;
}
?>