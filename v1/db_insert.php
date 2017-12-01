<?php include "db_connect.php";?>
<?php         
    if(($_POST['station_name'] == "") || ($_POST['ip'] == "") || ($_POST['mac'] == "")){
        die("Enter all fields first.");                
    }
    else{                 
        $sql = "INSERT INTO ap_scale_test_bed ".
            "(SNo, StationName, IP, MAC) "."VALUES ".
            "('$_POST[sno]', '$_POST[station_name]','$_POST[ip]', '$_POST[mac]')";
            
        $retval = mysqli_query( $conn, $sql );
        if(! $retval ) {
            die('Could not enter data: ' . mysql_error());
        } 
        echo "Entered data successfully";
        mysqli_close($conn);
    }         
?>
