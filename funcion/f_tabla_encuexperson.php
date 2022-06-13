
<?php
include ('../config/conexion.php');

$response = array();

$sql = "SELECT c.ID_COLABORADOR, C.NOMBRE, C.DPTO, C.APELLIDO, ESTAT=IIF(C.[STATUS] = 1, 'ACTIVO', 'INACTIVO'), COUNT(s.ID_SURVEY) AS TOTAL
FROM colaborador c
LEFT JOIN survey s ON c.ID_COLABORADOR = s.COL_ID_COLABORADOR
GROUP BY c.ID_COLABORADOR, C.NOMBRE, C.DPTO, C.APELLIDO, C.[STATUS]
ORDER BY TOTAL";
$stmt = sqlsrv_query($conn, $sql);

$response['data'] = array();



    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
  $response['data'][] = array(
                      $row['ID_COLABORADOR'],
                      utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                      $row['ESTAT'],
                      $row['DPTO'],
                      $row['TOTAL']
                       );
    }
  echo json_encode($response, JSON_UNESCAPED_UNICODE);


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);


?>
