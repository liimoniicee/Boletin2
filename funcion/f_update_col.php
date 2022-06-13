<?php
  include "../config/conexion.php";
  $response = array();
  
  $id     = $_POST['id'];
  $nom     = utf8_decode($_POST['nom']);
  $ape     = utf8_decode($_POST['ape']);
  $area     = $_POST['area'];
  $dpto     = $_POST['dpto'];
  $stat     = $_POST['stat'];
 

  $sql = "UPDATE colaborador SET
  NOMBRE = '$nom',
  APELLIDO = '$ape',
  AREA = '$area',
  DPTO = '$dpto',
  [STATUS] = '$stat'
  WHERE ID_COLABORADOR = '$id'; "; 
  
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