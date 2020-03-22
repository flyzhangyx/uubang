<?php  
function create_connect($database)
{
	$link=mysqli_connect("localhost","root","password",$database);
	return $link;
}
?>
