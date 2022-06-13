
<?php

//=============================Tablas de administrador=============================
function equisde(){
include ('../config/conexion.php');

$response = array();

$sql = "SELECT * FROM colaborador c, survey s WHERE ID_COLABORADOR = COL_ID_COLABORADOR ";
$stmt = sqlsrv_query($conn, $sql);

$response['data'] = array();
$i = 0;


    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
{
  $response['data'][] = array(
                      "id" => $row['ID_SURVEY'],
                      "nombre" => utf8_encode($row['NOMBRE']),
                      "apellido" => utf8_encode($row['APELLIDO']),
                      "dpto" =>  utf8_encode($row['DPTO'])
                       );


    }
//  print json_encode($response, JSON_UNESCAPED_UNICODE);
return json_encode($response, JSON_UNESCAPED_UNICODE);

sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

}
if (isset($_POST['callFunc'])) {
        echo equisde();
    }

//
function activsinto(){
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
                    "id" =>   $row['ID_SURVEY'],
                    "nombre" =>   utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                    "area" =>   $row['AREA'],
                    "sinto" =>   $row['SINTOMAS'],
                    "coment" =>   utf8_encode($row['COMENT']),
                    "fecha" =>   $row['FECHA']->format('m/d/Y')
                       );
    }
  return json_encode($response, JSON_UNESCAPED_UNICODE);


sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

}
if (isset($_POST['f_activsinto'])) {
        echo activsinto();
    }
  // fin funcion activ sinto

  // inicia encuestas por persona total
function encuexperson(){
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
                        "id" =>  $row['ID_COLABORADOR'],
                        "nombre" =>  utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                        "estat" =>  $row['ESTAT'],
                        "dpto" =>  $row['DPTO'],
                        "total" =>  $row['TOTAL']
                         );
      }
    return json_encode($response, JSON_UNESCAPED_UNICODE);


  sqlsrv_free_stmt($stmt);
  sqlsrv_close($conn);

}
if (isset($_POST['f_encuexperson'])) {
        echo encuexperson();
    }

    // fin encuesta por persona


      // tabla colaboradores
      function colaboradores(){
    include ('../config/conexion.php');

    $response = array();

    $sql = "SELECT C.ID_COLABORADOR, C.NOMBRE, C.APELLIDO, C.DPTO, C.AREA, ESTAT=IIF(C.STATUS = 1, 'ACTIVO', 'INACTIVO')
                 FROM colaborador C";
    $stmt = sqlsrv_query($conn, $sql);

    $response['data'] = array();



        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
    {
      $response['data'][] = array(
                        "id" =>  $row['ID_COLABORADOR'],
                        "nombre" =>  utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                        "dpto" =>  $row['DPTO'],
                        "area" =>  $row['AREA'],
                        "estat" =>  $row['ESTAT']

                           );
        }
      return json_encode($response, JSON_UNESCAPED_UNICODE);


    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
    if (isset($_POST['f_colaboradores'])) {
            echo colaboradores();
        }

        //fin tabla colaboradores


        //====================== fin tablas administrador / inicia tablas survey ====================

        // inicia encuestas realizadas
      function encuereal(){
        include ('../config/conexion.php');
        date_default_timezone_set("America/Monterrey");
       $fecha = date("d-m-Y");
        $week2 = date("W", strtotime("+1 day",strtotime($fecha)));
       $week = $week2 + 1;
        $response = array();

        $sql = "SELECT Q.ID_SURVEY, C.NOMBRE, C.APELLIDO, C.DPTO, C.AREA, Q.FECHA,
        (CASE WHEN 1 IN  ( Q.FIEBRE, Q.RESPIRAR, Q.TOS, Q.CONTACTO)
        THEN 'SI'
        WHEN Q.SINTOMAS != 'NADA' THEN 'SI'
        ELSE 'NO'
        END) AS SINTOMAS FROM colaborador C, survey Q
            WHERE C.ID_COLABORADOR = Q.COL_ID_COLABORADOR AND Q.SEMANA = '$week'";
        $stmt = sqlsrv_query($conn, $sql);

        $response['data'] = array();



            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
        {
          $response['data'][] = array(
                              "id" =>  $row['ID_SURVEY'],
                              "nombre" =>  utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                              "dpto" =>  $row['DPTO'],
                              "area" =>  $row['AREA'],
                              "sinto" =>  $row['SINTOMAS'],
                              "fecha" =>  $row['FECHA']->format('m/d/Y')
                               );
            }
          return json_encode($response, JSON_UNESCAPED_UNICODE);


        sqlsrv_free_stmt($stmt);
        sqlsrv_close($conn);

      }
      if (isset($_POST['f_encuereal'])) {
              echo encuereal();
          }

          // fin encuesta realizadas


            // falta de encuesta
            function faltaencue(){
          include ('../config/conexion.php');
          date_default_timezone_set("America/Monterrey");
         $fecha = date("d-m-Y");
          $week2 = date("W", strtotime("+1 day",strtotime($fecha)));
         $week = $week2 + 1;

          $response = array();

          $sql = "SELECT C.ID_COLABORADOR, C.NOMBRE, C.APELLIDO, C.DPTO, C.AREA FROM colaborador C
                           WHERE NOT EXISTS (
                           SELECT Q.COL_ID_COLABORADOR FROM survey Q WHERE Q.COL_ID_COLABORADOR = C.ID_COLABORADOR  AND SEMANA = '$week') AND C.STATUS = '1'";
          $stmt = sqlsrv_query($conn, $sql);

          $response['data'] = array();



              while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
          {
            $response['data'][] = array(
                              "id" =>  $row['ID_COLABORADOR'],
                              "nombre" =>  utf8_encode($row['NOMBRE'])." ".utf8_encode($row['APELLIDO']),
                              "dpto" =>  $row['DPTO'],
                              "area" =>  $row['AREA']

                                 );
              }
            return json_encode($response, JSON_UNESCAPED_UNICODE);


          sqlsrv_free_stmt($stmt);
          sqlsrv_close($conn);
      }
          if (isset($_POST['f_faltaencue'])) {
                  echo faltaencue();
              }

              //falta de encuesta

//====================== fin tablas survey / inicia tablas boletin ====================


      // tabla boletin
      function boletin(){
    include ('../config/conexion.php');

    $response = array();

    $sql = "SELECT ID_BOLETIN, TITULO, TEXTO, TIPO=IIF(TIPO = 1, 'NOTICIAS', 'ESPECIAL') FROM BOLETIN";
    $stmt = sqlsrv_query($conn, $sql);

    $response['data'] = array();



        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
    {
      $response['data'][] = array(
                        "id" =>  $row['ID_BOLETIN'],
                        "titulo" =>  utf8_encode($row['TITULO']),
                        "texto" =>  utf8_encode(substr($row['TEXTO'], 0, 40)),
                        "tipo" =>  $row['TIPO']

                           );
        }
      return json_encode($response, JSON_UNESCAPED_UNICODE);


    sqlsrv_free_stmt($stmt);
    sqlsrv_close($conn);
}
    if (isset($_POST['f_boletin'])) {
            echo boletin();
        }

        //fin tabla boletin

              // tabla eventos
              function eventos(){
            include ('../config/conexion.php');

            $response = array();

            $sql = "SELECT ID_EVENTO, NOMBRE_EVE, PUESTO_EVE, DIA_EVE, TIPO=IIF(TIPO_EVE = 1, 'EMP MES', 'CUMPLE'), IMG_EVE FROM EVENTO ";
            $stmt = sqlsrv_query($conn, $sql);

            $response['data'] = array();



                while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
            {
              $response['data'][] = array(
                                "id" =>  $row['ID_EVENTO'],
                                "nombre" =>  utf8_encode($row['NOMBRE_EVE']),
                                "puesto" =>  utf8_encode($row['PUESTO_EVE']),
                                "dia" =>  $row['DIA_EVE'],
                                "tipo" =>  $row['TIPO'],
                                "img" =>  $row['IMG_EVE']

                                   );
                }
              return json_encode($response, JSON_UNESCAPED_UNICODE);


            sqlsrv_free_stmt($stmt);
            sqlsrv_close($conn);
        }
            if (isset($_POST['f_eventos'])) {
                    echo eventos();
                }

                //fin tabla eventos

                      // tabla mensajes
                      function mensajes(){
                    include ('../config/conexion.php');

                    $response = array();

                    $sql = "SELECT C.ID_COMENTARIO, C.NOMBRE, C.COMENTARIO, E.NOMBRE_EVE AS DESTI
                    FROM COMENTARIOS C, EVENTO E WHERE C.TIPO_COMEN = 1 AND C.EVENTO_ID_EVENTO = E.ID_EVENTO ";
                    $stmt = sqlsrv_query($conn, $sql);

                    $response['data'] = array();



                        while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC))
                    {
                      $response['data'][] = array(
                                        "id" =>  $row['ID_COMENTARIO'],
                                        "nombre" =>  utf8_encode($row['NOMBRE']),
                                        "comen" =>  utf8_encode($row['COMENTARIO']),
                                        "desti" =>  utf8_encode($row['DESTI'])

                                           );
                        }
                      return json_encode($response, JSON_UNESCAPED_UNICODE);


                    sqlsrv_free_stmt($stmt);
                    sqlsrv_close($conn);
                }
                    if (isset($_POST['f_mensajes'])) {
                            echo mensajes();
                        }

                        //fin tabla mensajes


?>
