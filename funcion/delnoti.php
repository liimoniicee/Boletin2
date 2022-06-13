<?PHP
 include '../config/conexion.php';
$response = array();
if ($_POST['delete']) {
    //CONSULTA IMG PARA BORRARLA DEL SERVIDOR
    $cons = "SELECT IMG FROM boletin";
    $resultado = sqlsrv_query($conn, $cons, array(), array( "Scrollable" => 'static' ));
     while($row = sqlsrv_fetch_array($resultado, SQLSRV_FETCH_ASSOC)) {
       $img = $row["IMG"];
     }
     unlink("../assets/images/notice/".$img);

     //ejecuta el query para borrar el dato de la bd
    $id = intval($_POST['delete']);
    $query = "DELETE
    FROM
    boletin
    WHERE
    ID_BOLETIN='$id'";
    $stmt = sqlsrv_prepare($conn,$query);
    sqlsrv_execute($stmt);

    if ($stmt) {
        $response['status']  = 'success';
 $response['message'] = 'Product Deleted Successfully ...';

    } else {
        $response['status']  = 'error';
 $response['message'] = 'Unable to delete product ...';
    }
    echo json_encode($response);
}
