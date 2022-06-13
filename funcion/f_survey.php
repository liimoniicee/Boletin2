<?php
date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();

  $id  = $_POST['names'];

    $fecha = date('d-m-Y');
    $week2 = date("W", strtotime("+1 day",strtotime($fecha)));
    $week = $week2 + 1 ;

      $validar = "SELECT C.[ID_COLABORADOR], [SEMANA] FROM survey Q, colaborador C
      WHERE Q.[COL_ID_COLABORADOR] = '$id' AND C.[ID_COLABORADOR] = Q.[COL_ID_COLABORADOR] AND [SEMANA] = '$week'";

        $resultado = sqlsrv_query($conn, $validar, array(), array( "Scrollable" => 'static' ));

      if ( $row_cnt =  sqlsrv_num_rows( $resultado ) > 0) {

        $response['title']  = 'Success';
        $response['status']  = 'success';
        $response['message'] = 'Ya realizaste una encuesta esta semana';

    }

    else{
      $tos     = $_POST['tos'];
      $resp     = $_POST['respirar'];
      $fie     = $_POST['fiebre'];
      $contacto   = $_POST['contacto'];
      $firma     = $_POST['output'];
      $sies = $_POST['sintoma'];

      $sintomas = "";
if($sies == '2'){
    $sintomas = "NADA";
}else{

    $myboxes = $_POST['sintomas'];
    foreach ($myboxes as $key => $value) {
        $num = $key+1;
        is_array($value);
            $sintomas .= $num.". ". $value.", ";
    }
  }
  if ($sintomas == "") {
    $sintomas = "NADA";
  }

      $sql = "INSERT INTO survey
      (TOS, RESPIRAR, FIEBRE, SINTOMAS, CONTACTO, FECHA, FIRMA, COL_ID_COLABORADOR, SEMANA)
      VALUES
      ('$tos', '$resp', '$fie', '$sintomas', '$contacto', '$fecha','$firma', '$id', '$week');";
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
