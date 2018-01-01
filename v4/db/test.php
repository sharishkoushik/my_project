<?php include "db_connect.php";?>
<?php         
                  
        $sql = "SHOW COLUMNS FROM ap_scale_test_bed";
        $retval = mysqli_query( $conn, $sql );
        $col_names = array();
        while($row = mysqli_fetch_assoc($retval)) {
             array_push($col_names, $row['Field']);
        mysqli_close($conn);
    }         
?>
