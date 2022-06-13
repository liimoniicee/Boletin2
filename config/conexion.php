<?php
	$serverName = "localhost,1433";
	$connectionOptions = array("Database"=>"OVAPrt_Quest", 
		"UID"=>"dbProtocolo", "PWD"=>"S3rv3rN4m3");
        $conn = sqlsrv_connect($serverName, $connectionOptions);
        if($conn == false)
            die(sqlsrv_errors());
?>