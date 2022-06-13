<?php

include '../config/conexion.php';

$response = array();
if(isset($_POST['id'])){
  $id_m = $_POST['id'];


  $consulta = "SELECT ID_SURVEY, FIRMA, SINTOMAS, COMENT,
  TOS=IIF(TOS=1, 'Si', 'No'),
  RESP=IIF(RESPIRAR=1, 'Si', 'No'),
  FIE=IIF(FIEBRE=1, 'Si', 'No'),
  CONT=IIF(CONTACTO=1, 'Si', 'No')
  FROM SURVEY
  WHERE ID_SURVEY = '$id_m'";


   $resultado = sqlsrv_query($conn, $consulta, array(), array( "Scrollable" => 'static' ));


   if(sqlsrv_num_rows( $resultado ) > 0){

    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
  $response['data'] = array (
    "id" => $id_m,

    "tos"  =>  $row["TOS"],
    "resp" => $row["RESP"],
    "fie" => $row["FIE"],
    "sint" => $row["SINTOMAS"],
    "cont" => $row["CONT"],
    "firm"=> $row["FIRMA"],
    "seg"=> $row["COMENT"]
        );


   }
   }

  $response['codigo'] = 1;
  $response['msj'] = "El id se recibio ".$id_m." ERROR: ";
}
else{
  $response['codigo'] = 0;
  $response['msj'] = "Error no se recibio el id";
}

echo json_encode($response);
sqlsrv_close( $conn );

 ?>
