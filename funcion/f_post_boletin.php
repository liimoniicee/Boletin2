
<?php

include ("../config/conexion.php");
if(isset($_POST['noti_id']))
{
$id = $_POST['noti_id'];
  $cons = "SELECT ID_BOLETIN, TITULO, TEXTO, TIPO=IIF(TIPO = 1, 'NOTICIA', 'ESPECIAL') FROM BOLETIN WHERE ID_BOLETIN = '$id' ";
  $result1 =  sqlsrv_query($conn, $cons, array(), array( "Scrollable" => 'static' ));
             while($row = sqlsrv_fetch_array($result1, SQLSRV_FETCH_ASSOC)) {

echo "
<form id='form_noti' method='post'>
        <input class='form-control' type='hidden' id='id' name='id_n' value='".$row['ID_BOLETIN']."'/></br>
        <label>Titulo</label>
        <input class='form-control' type='text' name='titu' value='".utf8_encode($row['TITULO'])."' placeholder='Titulo'/></br>
        <label>Texto</label>
        <textarea  class='form-control' rows='6' name='text'>".utf8_encode($row['TEXTO'])."></textarea></br>
        <label>Tipo</label>
        <select  class='form-control' name='tipo' >
        <option disabled selected>".$row['TIPO']."</option>
        <option value='1'>NOTICIA</option>
          <option value='2'>ESPECIAL</option>

        </select></br>
        <label>Imagen</label>
        <input type='file' id='img' class='form-control'  name='img'></input></br>
        <button  type='submit' id='btn-submit' value='submit' class='btn btn-primary'>Save</button>
</form>

";
  }
//exit;
}
sqlsrv_close( $conn );
?>
