<?php

  include "../config/conexion.php";
  $response = array();
  session_start();

if ( (isset($_POST['user'])) || (isset($_POST['pass'])) ){
      $usu = $_POST['user'];
       $pass = md5($_POST['pass']);
        
$consulta = "SELECT [ID_USU], [USUARIO], [PASSWORD]  FROM usuario WHERE [USUARIO] = '$usu' AND [PASSWORD] = '$pass'";

$resultado = sqlsrv_query($conn, $consulta, array(), array( "Scrollable" => 'static' ));
$row_count = sqlsrv_num_rows( $resultado );  
if(sqlsrv_num_rows($resultado) > 0){
	while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {

   $_SESSION['id'] = $row["ID_USU"];
   $_SESSION['usuario']= $row["USUARIO"];
               
                }
                 
                $response['status']  = 'success';
                $response['title'] = 'Success!';
                $response['message'] = 'Bienvenido '.$usu;
               
}

else{
                $response['status']  = 'error';
                $response['title'] = 'Error!';
                $response['message'] = 'Revisa que los datos sean correctos';

}
}
  echo json_encode($response);
  sqlsrv_close($conn);
          ?>