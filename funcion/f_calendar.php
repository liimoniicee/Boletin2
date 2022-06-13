
<?php

include '../config/conexion.php';



$response = array();

$consulta = "SELECT COUNT(ID_SURVEY)AS TOTAL, FECHA FROM survey GROUP BY FECHA";


 $resultado = sqlsrv_query($conn, $consulta, array(), array( "Scrollable" => 'static' ));


 if(sqlsrv_num_rows( $resultado ) > 0){

  while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
$response[] = array (
 
  "title"  =>  $row["TOTAL"],
  "start"  =>  $row["FECHA"]->format('Y-m-d'),
  "display" => "list-item"

      );


 }
 }else{
$response = "error".sqlsrv_errors();
 }
 echo json_encode($response);

 sqlsrv_close( $conn );


/*
$event[] = array(

        'title' => 'Example Class',
        'start' => '2021-08-29 09:00:00'
        
);*/


  ?>