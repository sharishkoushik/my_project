<?php include "db_connect.php";?>
<?php 
    if(($_POST['station_name'] == "") || ($_POST['ip'] == "") || ($_POST['mac'] == "")){
        die("Enter all fields first.");                
    }
    else{
        //echo $_POST['station_name']."<br>"; To receive the value from JS

        $sql = "UPDATE ap_scale_test_bed SET ".
            "StationName = "."'$_POST[station_name]',"." IP = "."'$_POST[ip]',"." MAC = "."'$_POST[mac]'"." WHERE SNo = "."$_POST[sno]";
                
        $retval = mysqli_query( $conn, $sql );         
        if(! $retval ) {
            die('Could not enter data: ' . mysql_error());
        }
        echo "Entered data successfully";
        mysqli_close($conn);
    }         
?>
