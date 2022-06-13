<?php
include ('../config/conexion.php');

$id=$_POST['user_id'];
$select="SELECT NOMBRE, COMENTARIO, convert(varchar, fecha)as FECHA, EVENTO_ID_EVENTO FROM comentarios
WHERE EVENTO_ID_EVENTO = '$id' order by FECHA desc";
$result1 =  sqlsrv_query($conn, $select, array(), array( "Scrollable" => 'static' ));
            while($row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) {

   echo "

        <div class='card'>
        <div class='card-title'>
        <h6 class='text-primary'>".utf8_encode($row['NOMBRE'])." <small class='text-muted'>".$row['FECHA']."</small></h6>
         </div>
        <div class='card-body'>
                <em>".$row['COMENTARIO']."</em>
        </div>
    </div><hr>
    ";
  }
  ?>
