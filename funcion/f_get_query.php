<?php

function consulta($cons){
include ('config/conexion.php');

$resu = sqlsrv_query($conn, $cons);
            while($row = sqlsrv_fetch_array($resu, SQLSRV_FETCH_ASSOC)) {
          echo $temp  =  $row["TOTAL"];
         }
         //sqlsrv_close( $conn );
}

// ========================= emp del mes =========================
function emple($cons){
  include ('config/conexion.php');
  $result1 =  sqlsrv_query($conn, $cons, array(), array( "Scrollable" => 'static' ));



              while($row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) {
     echo "
        <div class='col-md-4 pt-2'>
          <div class='card profile-card-3'>
          <div class='background-block'>
          <img src='https://media.istockphoto.com/photos/bokeh-awards-background-picture-id904124364?b=1&k=6&m=904124364&s=170667a&w=0&h=F5GJvT80tkQA7tyXBZ9ULdrEYlaCjQOoHd-WQZr9GW4=' alt='profile-sample1'/>
          </div>
          <div class='profile-thumb-block'>
          <img src='assets/images/profile/".$row['IMG_EVE']."' alt='profile-image' class='profile'/>
          </div>
          <div class='card-content'>
              <h5>".utf8_encode($row['NOMBRE_EVE'])."</h5><small class='text-muted'>".$row['PUESTO_EVE']."</small>
              <div class='icon-block'><a onClick='onClick1(".$row['ID_EVENTO'].")'><i class='fa fa-heart' title='Dale like'></i></a><a id='ID".$row['ID_EVENTO']."'>".$row['LIKES_EVE']."</a>
              <a data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='".$row['ID_EVENTO']."' data-nombre='".utf8_encode($row['NOMBRE_EVE'])." '><i title='Dejale un mensaje' class='fa fa-comments'></i></a>
              </div>
              </div>
          </div>

          </div>
         ";
              }
              sqlsrv_close( $conn );
          }
// ========================= Cumpleaños =========================
function cumple($cons){
  include ('config/conexion.php');
  $result1 =  sqlsrv_query($conn, $cons, array(), array( "Scrollable" => 'static' ));



              while($row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) {

     echo "
        <div class='col-md-3 pt-2'>
          <div class='card profile-card-1'>
          <img src='assets/images/cards/background_cumple.jpg' alt='profile-sample1' class='background'/>
          <img src='assets/images/profile/".$row['IMG_EVE']."' alt='profile-image' class='profile'/>
            <div class='card-content'>
              <h5 class='text-white'>".utf8_encode($row['NOMBRE_EVE'])." </h5> <small class='text-white'>".$row['DIA_EVE']."</small>
              <div class='icon-block'><a onClick='onClick1(".$row['ID_EVENTO'].")'><i class='fa fa-heart' title='Dale like'></i></a><a id='ID".$row['ID_EVENTO']."'>".$row['LIKES_EVE']."</a>
              <a data-bs-toggle='modal' data-bs-target='#exampleModal' data-id='".$row['ID_EVENTO']."' data-nombre='".utf8_encode($row['NOMBRE_EVE'])." '><i title='Dejale un mensaje' class='fa fa-comments'></i></a>
              </div>
              </div>
          </div>

          </div>
         ";
              }
              sqlsrv_close( $conn );
          }

//tabla de consulta eventos cumpleaños y emp mes
function table($cons){
    include ('config/conexion.php');
  $resu6 = sqlsrv_query($conn, $cons);
    while($row = sqlsrv_fetch_array($resu6, SQLSRV_FETCH_ASSOC)) {

echo "
<tr>
<td>".$row['ID_EVENTO']."</td>
<td>".utf8_encode($row['NOMBRE_EVE'])."</td>
<td>".utf8_encode($row['PUESTO_EVE'])."</td>
<td>".$row['DIA_EVE']."</td>
<td>".$row['TIPO']."</td>
<td>".$row['IMG_EVE']."</td>
<td>
<button class='btn btn-warning' onclick= 'consultQ(".$row['ID_EVENTO']."),verinfo();' ><i class='lni lni-pencil-alt'></i> </button>
  <button class='btn btn-danger' onclick= 'delevent(".$row['ID_EVENTO'].");' >  <i class='lni lni-trash-can'></i> </button>
</td>
</tr>


";
  }
  sqlsrv_close( $conn );
  }



    function carrusel($cons){
          include ('config/conexion.php');
      $resu6 = sqlsrv_query($conn, $cons);
        while($row = sqlsrv_fetch_array($resu6, SQLSRV_FETCH_ASSOC)) {
            echo "
            <div class='item'>
              <div class='work-wrap d-md-flex'>
                <div class='img order-md-last' style='background-image: url(assets/images/notice/".$row['IMG'].");'></div>
                <div class='text text-left text-lg-right p-4 px-xl-5 d-flex align-items-center'>
                  <div class='desc w-100'>
                    <h3 class='h3'>".utf8_encode($row['TITULO'])."</h3>

                    <div class='row justify-content-end'>
                      <div class='col-xl-12'>
                        <p style='text-align: justify;'>".utf8_encode($row['TEXTO'])."</p>
                      </div>
                    </div>
                    <small class='text-muted'>".$row['FECHA_BOL']->format('d-m-Y')."</small>
                    "./*<p>
                      <button type='button' class='btn btn-outline-dark mb-2 py-3 px-4'>Shop the collection Outline</button>
                      <button type='button' class='btn btn-dark mb-2 py-3 px-4'>Learn More</button>
                    </p>*/"
                  </div>
                </div>
              </div>
            </div>
                ";
                }
                sqlsrv_close( $conn );

    }


?>
