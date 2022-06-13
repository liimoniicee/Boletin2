<?php
date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();


  $nom     = utf8_decode($_POST['nom']);
  $tipo     = $_POST['tipo'];
  $pues    = utf8_decode($_POST['pues']);
  $dia     = $_POST['dia'];
  if (!file_exists($_FILES['foto']['tmp_name']) || !is_uploaded_file($_FILES['foto']['tmp_name']))
  {
    $response['status']  = 'error';
    $response['message'] = 'selecciona una img correcta';
  }
  else
  {
    $imagen1 = $_FILES['foto']['tmp_name'];
    $destino2 = "../assets/images/profile/". $_FILES['foto']['name'];
    $destino =  $_FILES['foto']['name'];
    move_uploaded_file($imagen1, $destino2);
  $sql = "INSERT INTO evento
  ([NOMBRE_EVE], [TIPO_EVE], [PUESTO_EVE], [LIKES_EVE], [DIA_EVE], [IMG_EVE])
  VALUES
  ('$nom', '$tipo', '$pues','0', '$dia', '$destino');";
            $stmt = sqlsrv_prepare($conn,$sql);
            sqlsrv_execute($stmt);
            if ($stmt) {
             $response['title']  = 'Listo!';
                $response['status']  = 'success';
          $response['message'] = 'Se ha creado el colaborador';

            }else{
            $response['title']  = 'Error';
                $response['status']  = 'error';
                $response['message'] = 'asegurate de llenar todos los campos';
            echo "Error: ";
            }
}
          sqlsrv_close( $conn );
         echo json_encode($response);




          ?>
