<?php

include '../config/conexion.php';



$response = array();
if(isset($_POST['id'])){
  $id_m = $_POST['id'];


  $consulta = "SELECT *
FROM colaborador
WHERE ID_COLABORADOR = '$id_m'";


   $resultado = sqlsrv_query($conn, $consulta, array(), array( "Scrollable" => 'static' ));


   if(sqlsrv_num_rows( $resultado ) > 0){

    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
  $response['data'] = array (
    
    "nom"  =>  utf8_encode($row["NOMBRE"]),
    "ape"  =>  utf8_encode($row["APELLIDO"]),
    "area" => $row["AREA"],
    "dpto" => $row["DPTO"],
    "stat" => $row["STATUS"]
   
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