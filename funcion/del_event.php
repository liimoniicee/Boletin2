<?PHP
 include '../config/conexion.php';
$response = array();
if ($_POST['delete']) {

    $id = intval($_POST['delete']);
    $query = "DELETE
    FROM
    evento
    WHERE
    ID_EVENTO='$id'";
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
