<?php
  include "../config/conexion.php";
  $response = array();

  $id     = $_POST['id'];
  $seg     = utf8_decode($_POST['seg']);

  $sql = "UPDATE survey SET
  COMENT = '$seg'
  WHERE ID_SURVEY = '$id'; ";

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
            echo "Error: ";
            }


  echo json_encode($response);
  sqlsrv_close( $conn );
          ?>
