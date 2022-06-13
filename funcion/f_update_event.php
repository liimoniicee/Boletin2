<?php
  include "../config/conexion.php";
  $response = array();

  $id     = $_POST['id'];
  $nom     = utf8_decode($_POST['nom']);
  $pues     = utf8_decode($_POST['pues']);
  $dia     = $_POST['dia'];
  $tipo     = $_POST['tipo'];
  $srcimg = $_POST["srcfoto"];
  if (!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name']))
  {
    $sql = "UPDATE evento SET
    NOMBRE_EVE = '$nom',
    PUESTO_EVE = '$pues',
    DIA_EVE = '$dia',
    TIPO_EVE = '$tipo'

      WHERE ID_EVENTO = '$id'; ";

    $stmt = sqlsrv_prepare($conn,$sql);
        sqlsrv_execute($stmt);
              if ($stmt) {
            $response['title']  = 'Exito';
            $response['status']  = 'success';
            $response['message'] = 'Se han guardado los cambios';

              }else{
                  $response['title']  = 'Error';
                  $response['status']  = 'error';
                  $response['message'] = 'Algo salio mal';

              }
  }
  else
  {
    unlink("../".$srcimg);
    $imagen1 = $_FILES['foto']['tmp_name'];
    $destino2 = "../assets/images/profile/". $_FILES['foto']['name'];
    $destino =  $_FILES['foto']['name'];
    move_uploaded_file($imagen1, $destino2);
  $sql = "UPDATE evento SET
  NOMBRE_EVE = '$nom',
  PUESTO_EVE = '$pues',
  DIA_EVE = '$dia',
  TIPO_EVE = '$tipo',
  IMG_EVE = '$destino'
    WHERE ID_EVENTO = '$id'; ";

  $stmt = sqlsrv_prepare($conn,$sql);
      sqlsrv_execute($stmt);
            if ($stmt) {
          $response['title']  = 'Exito';
          $response['status']  = 'success';
          $response['message'] = 'Se han guardado los cambios';

            }else{
                $response['title']  = 'Error';
                $response['status']  = 'error';
                $response['message'] = 'Algo salio mal';

            }
}

  echo json_encode($response);
  sqlsrv_close( $conn );
          ?>
