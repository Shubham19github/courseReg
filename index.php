<?php 
require 'core.inc.php';
require 'connect.inc.php';

if(loggedin())
{
	$fullname = getuserfield('fullname');
	include 'first.php';
}
else
{
	include 'loginform.inc.php';
}	

?>