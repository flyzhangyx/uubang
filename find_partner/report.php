<?php
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
$uri = 'https://';
} else {
$uri = 'http://';
}
//$uri .= $_SERVER['HTTP_HOST'];
header('Location: '.$uri.'jinshuju.net/f/StdgW5');
exit;
?>
<!-- https:// -->
