<?php
    function Conexion()  
    {  
        try  
        {  
            $serverName = "tcp:dbserverseminario1.database.windows.net,1433";  
            $connectionOptions = array("Database"=>"dbseminario1","UID"=>"seminario1", "PWD"=>"Seminario200925014");  
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
			if( $conn === false ) {
				die( print_r( sqlsrv_errors(), true));
			}else{
			 echo 'Conexion Exitosa';
			    $sql = "SELECT id, nombre FROM comentarios";
				$stmt = sqlsrv_query( $conn, $sql );
				if( $stmt === false) {
					die( print_r( sqlsrv_errors(), true) );
				}else{

				while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
					  echo "<br/>". $row['id'].", ".$row['nombre']."<br />";
				}

				sqlsrv_free_stmt( $stmt);
				}
			}				
                
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    
	
	}
	

	Conexion();	    
?>

