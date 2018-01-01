<?php include "db/db_connect.php";?>
<?php         
               
        $sql = "show tables";
            
        $retval = mysqli_query( $conn, $sql );
        $result = array();
        while ($row = mysqli_fetch_row($retval)) {
            $x = "{$row[0]}";
            array_push($result, $x);
        //echo "x is : "."$x" ;
        }
        echo json_encode($result);
        
        mysqli_close($conn);            
?>
