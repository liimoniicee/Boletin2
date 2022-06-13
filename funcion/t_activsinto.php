<?php

///=======================
include ('../config/conexion.php');

$response = array();

$sql = "SELECT * FROM
(SELECT Q.ID_SURVEY, C.NOMBRE, C.APELLIDO, C.DPTO, C.AREA, Q.FECHA, Q.COMENT,
(CASE WHEN 1 IN  ( Q.FIEBRE, Q.RESPIRAR, Q.TOS, Q.CONTACTO)
THEN 'SI'
WHEN Q.SINTOMAS != 'NADA' THEN 'SI'
ELSE 'NO'
END) AS SINTOMAS FROM colaborador C, survey Q
WHERE C.ID_COLABORADOR = Q.COL_ID_COLABORADOR
)AS INERTABLE WHERE SINTOMAS = 'SI'";
$stmt = sqlsrv_query($conn, $sql);

$response['data'] = array();



    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
  $response['data'][] = array(
                      $row['ID_SURVEY'],
                      utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                      $row['AREA'],
                      $row['SINTOMAS'],
                      utf8_encode($row['COMENT']),
                      $row['FECHA']->format('m/d/Y')
                       );
    }
  echo json_encode($response, JSON_UNESCAPED_UNICODE);


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);


?>
