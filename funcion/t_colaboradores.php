<?php

///=================
include ('../config/conexion.php');

$response = array();

$sql = "SELECT C.ID_COLABORADOR, C.NOMBRE, C.APELLIDO, C.DPTO, C.AREA, ESTAT=IIF(C.STATUS = 1, 'ACTIVO', 'INACTIVO')
             FROM colaborador C";
$stmt = sqlsrv_query($conn, $sql);

$response['data'] = array();



    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
  $response['data'][] = array(
                      $row['ID_COLABORADOR'],
                      utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                      $row['DPTO'],
                      $row['AREA'],
                      $row['ESTAT']

                       );
    }
  echo json_encode($response, JSON_UNESCAPED_UNICODE);


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);


?>
