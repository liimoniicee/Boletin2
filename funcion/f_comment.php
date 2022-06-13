<?php
date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();
   
  $coment     = $_POST['coment'];

$fecha = date('Y-m-d');
//echo $fecha;
  $sql = "INSERT INTO comentarios (COMENTARIO, FECHA, [STATUS]) VALUES ('$coment', '$fecha','1') ";
            $stmt = sqlsrv_prepare($conn,$sql);
            sqlsrv_execute($stmt);
            if ($stmt) {
                $response['status']  = 'success';
          $response['message'] = 'Gracias!';

            }else{
                $response['status']  = 'error';
                $response['message'] = 'Make sure you have filled out the fields';
            echo "Error: ";
            }

          
  echo json_encode($response);
  sqlsrv_close( $conn );
          ?>