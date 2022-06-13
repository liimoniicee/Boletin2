<?php
  include "../config/conexion.php";
  $response = array();

  $id     = $_POST['id'];
  $tit     = utf8_decode($_POST['tit']);
  $text     = utf8_decode($_POST['text']);
  $tipo     = $_POST['tipo'];

  $sql = "UPDATE BOLETIN SET
  TITULO = '$tit',
  TEXTO = '$text',
  TIPO = '$tipo'
  WHERE ID_BOLETIN = '$id'; ";

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
