<?php
session_start();
unset( $_SESSION['id'] );
unset( $_SESSION['usuario'] );
session_destroy();


header("location: ../login.php");

?>
