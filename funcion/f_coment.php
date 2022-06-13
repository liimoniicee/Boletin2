<?php
date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();

 
    $fecha = date('d-m-Y');
    $week2 = date("W", strtotime("+1 day",strtotime($fecha)));
    $week = $week2 + 1 ;
      $nom     = $_POST['nom'];
      $msg     = $_POST['msg'];
      $tipo     = 1;
      $status = 1;
     

      $sql = "INSERT INTO comentarios
      ([NOMBRE], [COMENTARIO], [FECHA], [TIPO_COMEN], [SEMANA], [STATUS]) 
      VALUES 
      ('$nom', '$msg', '$fecha', '$tipo', $week, $status);";
                $stmt = sqlsrv_prepare($conn,$sql);
                sqlsrv_execute($stmt);
                if ($stmt) {
              $response['title']  = 'Thank You!';
              $response['status']  = 'success';
              $response['message'] = 'Finalizado';    
                }else{
                $response['title']  = 'Error';
                    $response['status']  = 'error';
                    $response['message'] = 'Make sure you have filled out the fields';
                echo "Error: ";
                }
              
              sqlsrv_close( $conn );
             echo json_encode($response);
     
    
    
    
              ?>