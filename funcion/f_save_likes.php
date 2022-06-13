<?php
  include "../config/conexion.php";
  $response = array();
  
  $id     = $_POST['id'];
  $clicks     = $_POST['clicks1'];
  
  $sql = "UPDATE evento SET
  LIKES_EVE = '$clicks'
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
            echo "Error: ";
            }

          
  echo json_encode($response);
  sqlsrv_close( $conn );
          ?>