<?php
date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();
$id = $_POST["id"];
$tit = utf8_decode($_POST["tit"]);
$text = utf8_decode($_POST["text"]);
$tipo = utf8_decode($_POST["tipo"]);
$srcimg = $_POST["srcimg"];
if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name']))
{
  $cons = "UPDATE boletin set TITULO = '$tit', TEXTO = '$text', TIPO = '$tipo' WHERE ID_BOLETIN = '$id'";

  $stmt = sqlsrv_prepare($conn,$cons);
  sqlsrv_execute($stmt);
  if ($stmt) {
      $response['status']  = 'success';
  $response['message'] = 'Guardado correctamente';

  }else{
      $response['status']  = 'error';
      $response['message'] = 'Error!, revisa que todo este bien';

  }
}
else
{
  unlink("../".$srcimg);
  $imagen1 = $_FILES['img']['tmp_name'];
  $destino2 = "../assets/images/notice/". $_FILES['img']['name'];
  $destino =  $_FILES['img']['name'];
  move_uploaded_file($imagen1, $destino2);
  //echo $destino;
  /*
  $micarpeta = "assets/galeria/almacen/$marca/$modelo/";
  if (!file_exists($micarpeta)) {
      mkdir($micarpeta, 0777, true);
  }

  */

  $cons = "UPDATE boletin set TITULO = '$tit', TEXTO = '$text', TIPO = '$tipo', IMG = '$destino' WHERE ID_BOLETIN = '$id'";

  $stmt = sqlsrv_prepare($conn,$cons);
  sqlsrv_execute($stmt);
  if ($stmt) {
      $response['status']  = 'success';
  $response['message'] = 'Guardado correctamente';

  }else{
      $response['status']  = 'error';
      $response['message'] = 'Error!, revisa que todo este bien';

  }
}


echo json_encode($response);
sqlsrv_close( $conn );
?>
