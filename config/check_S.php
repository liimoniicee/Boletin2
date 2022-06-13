<?php
session_start();
function verificar_sesion() {
	if(!isset ($_SESSION['id']) ){
        unset($_SESSION);
        echo "<script>window.open('config/Error_sesion.html','_self')</script>";
	}
}
