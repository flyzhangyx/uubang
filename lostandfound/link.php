<?php  
function create_connect($database)
{
	$link=mysqli_connect("localhost","root","182084qq.",$database);
	return $link;
}
?>
