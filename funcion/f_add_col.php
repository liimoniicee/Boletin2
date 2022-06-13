<?php
date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();

 
  $nom     = utf8_decode($_POST['nom']);
  $ape     = utf8_decode($_POST['ape']);
  $area     = $_POST['area'];
  $dpto    = $_POST['dpto'];
  $stat     = $_POST['stat'];
 

  $sql = "INSERT INTO colaborador
  ([NOMBRE], [APELLIDO], [AREA], [DPTO], [STATUS]) 
  VALUES 
  ('$nom', '$ape', '$area', '$dpto', '$stat');";
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

          sqlsrv_close( $conn );
         echo json_encode($response);
 



          ?>