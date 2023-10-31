<?php


session_start();

unset($_SESSION['uid']);
unset($_SESSION['role']);
echo "<script>window.location='login.php'</script>";

?>