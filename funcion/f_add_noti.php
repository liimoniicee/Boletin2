<?php
  date_default_timezone_set("America/Monterrey");
  include "../config/conexion.php";
  $response = array();


  $fecha = date('d-m-Y H:i:s');
  $tit     = utf8_decode($_POST['tit']);
  $text     = utf8_decode($_POST['text']);
  $tipo     = $_POST['tipo'];
  if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name']))
  {
    $response['status']  = 'error';
    $response['message'] = 'selecciona una img correcta';
  }
  else
  {
  $imagen1 = $_FILES['img']['tmp_name'];
  $destino2 = "../assets/images/notice/". $_FILES['img']['name'];
  $destino =  $_FILES['img']['name'];
  move_uploaded_file($imagen1, $destino2);

  $sql = "INSERT INTO boletin
  ([TITULO], [TEXTO], [TIPO], [IMG], [FECHA_BOL])
  VALUES
  ('$tit', '$text', '$tipo','$destino','$fecha');";
            $stmt = sqlsrv_prepare($conn,$sql);
            sqlsrv_execute($stmt);
            if ($stmt) {
             $response['title']  = 'Listo!';
             $response['status']  = 'success';
             $response['message'] = 'Se ha creado el evento';

            }else{
            $response['title']  = 'Error';
            $response['status']  = 'error';
            $response['message'] = 'asegurate de llenar todos los campos';
            echo "Error: ";
            }
}
          sqlsrv_close( $conn );
         echo json_encode($response);




          ?>
