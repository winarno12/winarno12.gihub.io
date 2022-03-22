
<?php
//session star
session_start();

$_SESSION = [];
session_unset();
session_destroy();
//lempar ke...
header("location:../index.php");
exit;
?>