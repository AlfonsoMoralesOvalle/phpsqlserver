<?php

 ReadData();

    function OpenConnection()  
    {  
        try  
        {  
            $serverName = "tcp:dbserverseminario1.database.windows.net,1433";  
            $connectionOptions = array("Database"=>"dbseminario1",  
                "Uid"=>"seminario1", "PWD"=>"Seminario200925014");  
            $conn = sqlsrv_connect($serverName, $connectionOptions);  
            if($conn == false)  
                die(FormatErrors(sqlsrv_errors()));  
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    }
    
function ReadData()  
    {  
        try  
        {  
            $conn = OpenConnection();  
            $tsql = "SELECT nombre FROM comentarios";  
            $getProducts = sqlsrv_query($conn, $tsql);  
            if ($getProducts == FALSE)  
                die(FormatErrors(sqlsrv_errors()));  
            $productCount = 0;  
            while($row = sqlsrv_fetch_array($getProducts, SQLSRV_FETCH_ASSOC))  
            {  
                echo($row['nombre']);  
                echo("<br/>");  
                $productCount++;  
            }  
            sqlsrv_free_stmt($getProducts);  
            sqlsrv_close($conn);  
        }  
        catch(Exception $e)  
        {  
            echo("Error!");  
        }  
    }       
?>

