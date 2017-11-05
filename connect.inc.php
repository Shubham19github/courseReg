<?php
$conn_error = 'Could not connect.';

$mysql_host = 'localhost';
$mysql_user = 'u632052323_pank';
$mysql_pass = 'pks01996';

$mysql_connect = @mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
$mysql_db = 'u632052323_stu';

if(!@mysqli_connect($mysql_host, $mysql_user, $mysql_pass) || !@mysqli_select_db($mysql_connect, $mysql_db))
{
	die($conn_error);
}

?>
