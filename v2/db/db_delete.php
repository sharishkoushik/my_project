<?php include "db_connect.php";?>
<?php

    $sql = "DELETE FROM ap_scale_test_bed WHERE ".
    "SNo="."'$_POST[sno]'";
    $retval = mysqli_query( $conn, $sql );
    if(!$retval ) {
        die('Could not delete data: ' . mysql_error());
    }
    $sql = "SET @count = 0";
    $retval = mysqli_query( $conn, $sql );
    if(!$retval ) {
        die('Could not delete data: ' . mysql_error());
    }
    $sql = "UPDATE ap_scale_test_bed SET ap_scale_test_bed.SNo = @count := @count +1";
    $retval = mysqli_query( $conn, $sql );
    if(!$retval ) {
        die('Could not delete data: ' . mysql_error());
    }
    echo "Data deleted successfully";
    mysqli_close($conn);
                 
?>
