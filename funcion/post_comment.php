
<?php

include ("../config/conexion.php");
if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_POST['user_name'];
  $id=$_POST['user_id'];
  $date = date('d-m-y H:i:s') ;
  $insert= "insert into comentarios(NOMBRE, COMENTARIO, FECHA, [STATUS], TIPO_COMEN, EVENTO_ID_EVENTO) values('$name','$comment', '$date', '1', '1', '$id')";
  $stmt = sqlsrv_prepare($conn,$insert);
  sqlsrv_execute($stmt);
  //$id=mysql_insert_id($insert);

  $select="SELECT NOMBRE, COMENTARIO, convert(varchar, fecha)as FECHA, EVENTO_ID_EVENTO from comentarios
  WHERE NOMBRE='$name' and COMENTARIO='$comment' and EVENTO_ID_EVENTO = '$id'
  order by FECHA desc";
$resu = sqlsrv_query($conn, $select);
  if($row = sqlsrv_fetch_array($resu, SQLSRV_FETCH_ASSOC))
  {

echo "
  <div class='card'>
  <div class='card-title'>
  <h6 class='text-primary'>".utf8_encode($row['NOMBRE'])." <small class='text-muted'>".$row['FECHA']."</small></h6>
   </div>
  <div class='card-body'>
          <em>".$row['COMENTARIO']."</em>
  </div>
</div><hr>";
  }
exit;
}

?>
