<?php


function get_comment(){

include ('config/conexion.php');
$var1 = "SELECT COUNT(ID_COMENTARIO) AS TOTAL FROM comentarios WHERE STATUS = 1";
$values = array();

  $resu = sqlsrv_query($conn, $var1);
            while($row = sqlsrv_fetch_array($resu, SQLSRV_FETCH_ASSOC)) {
            $values['TotComens']  =  $row["TOTAL"];
            
            }
            $var2 = "SELECT * FROM comentarios WHERE STATUS = 1";    
                  $resu2 = sqlsrv_query($conn, $var2);
            while($row = sqlsrv_fetch_array($resu2, SQLSRV_FETCH_ASSOC)) {
            
            $data[] = array($var = "<li>
                      <a href='#0'>
                        <div class='content'>
                          <h6>".$row['NOMBRE']."</h6>
                          <p>Ha activado sintomas</p>
                          <span>10 mins ago</span>
                        </div>
                      </a>
                    </li>");
            
            }
            return $values;
            return $data;
}

?>
