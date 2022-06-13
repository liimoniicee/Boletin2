<?php
date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();

  $id     = $_POST['names'];
  $temp     = $_POST['temp'];
  //$fiebre     = $_POST['fiebre'];
  $muscular     = $_POST['muscular'];
  $cansansio     = $_POST['cansansio'];
  $tos     = $_POST['tos'];
  $garganta     = $_POST['garganta'];
  $estornudos     = $_POST['estornudo'];
  $nasal     = $_POST['nasal'];
  $cabeza     = $_POST['cabeza'];
  $contacto     = $_POST['contacto'];
  $firma     = $_POST['output'];

$fecha = date('d-m-Y');
$week2 = date("W", strtotime("+1 day",strtotime($fecha)));
$week = $week2 + 1 ;

    $validar = "SELECT COLABORADOR_ID_COL, datepart(ww, Q.FECHA)as week FROM quest Q, colaborador C 
                WHERE COLABORADOR_ID_COL = '$id' AND C.ID_COLABORADOR= Q.COLABORADOR_ID_COL AND datepart(ww, Q.FECHA) = '$week'  ";
    $resultado = sqlsrv_query($conn, $validar, array(), array( "Scrollable" => 'static' ));

  if ( $row_cnt =  sqlsrv_num_rows( $resultado ) > 0) {


    $response['title']  = 'Success';
    $response['status']  = 'success';
    $response['message'] = 'Ya realizaste una encuesta esta semana';

}

else{


  $sql = "INSERT INTO quest
  (TEMPERATURA,  MUSCULAR, 
  CANSANCIO, TOS, GARGANTA, ESTORNUDO, CONGESTION, 
  CABEZA, CONTACTO_C_ENFERMO, FECHA, FIRMA, COLABORADOR_ID_COL, SEMANA) 
  VALUES 
  ('$temp', '$muscular', '$cansansio', '$tos', '$garganta', '$estornudos', '$nasal', '$cabeza', '$contacto', '$fecha', '$firma', '$id', '$week');";
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

          }
          sqlsrv_close( $conn );
         echo json_encode($response);
 



          ?>