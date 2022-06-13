<?php

include '../config/conexion.php';



$response = array();
if(isset($_POST['id'])){
  $id_m = $_POST['id'];


  $consulta = "SELECT ID_QUEST, FIRMA, FIE=IIF(FIEBRE=1, 'Si', 'No'), 
  TEMP=IIF(TEMPERATURA=1, 'Si', 'No'),
  MUSC=IIF(MUSCULAR=1, 'Si', 'No'),
  CANS=IIF(CANSANCIO=1, 'Si', 'No'),
  ESTOR=IIF(ESTORNUDO=1, 'Si', 'No'),
  CONG=IIF(CONGESTION=1, 'Si', 'No'),
  CONT=IIF(CONTACTO_C_ENFERMO=1, 'Si', 'No'),
  TOS=IIF(TOS=1, 'Si', 'No'),
  GARG=IIF(GARGANTA=1, 'Si', 'No'),
  CABE=IIF(CABEZA=1, 'Si', 'No')
  FROM quest
  WHERE ID_QUEST = '$id_m'";


   $resultado = sqlsrv_query($conn, $consulta, array(), array( "Scrollable" => 'static' ));


   if(sqlsrv_num_rows( $resultado ) > 0){

    while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
  $response['data'] = array (
    "id" => $id_m,
    "temp"  =>  $row["TEMP"],
    "tos"  =>  $row["TOS"],
    "cong" => $row["CONG"],
    "estor" => $row["ESTOR"],
    "fie" => $row["FIE"],
    "musc" => $row["MUSC"],
    "cans" => $row["CANS"],
    "garg" => $row["GARG"],
    "cabe" => $row["CABE"],
    "firm" => $row["FIRMA"],
    "cont" => $row["CONT"]
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