<?php include "db_connect.php";?>
<?php         
    /*if(($_POST['station_name'] == "") || ($_POST['ip'] == "") || ($_POST['mac'] == "")){
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
    } */        

$_POST = json_decode(file_get_contents('php://input'));
$headers_count = sizeof($_POST);


$sql  = "INSERT INTO "."$_POST[0]"." VALUES (";
for ($i = 1 ; $i < $headers_count; $i++){
    $sql1 = "'$_POST[$i]' ";
    if ($i != $headers_count-1){
        $sql1 = "$sql1".",";
    }
    $sql = $sql.$sql1;
}
$sql = "$sql".")";

$retval = mysqli_query( $conn, $sql );

if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
} 
echo "Entered data successfully";
mysqli_close($conn);
             
?>