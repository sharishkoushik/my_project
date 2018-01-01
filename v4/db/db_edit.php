<?php include "db_connect.php";?>
<?php 
    /*if(($_POST['station_name'] == "") || ($_POST['ip'] == "") || ($_POST['mac'] == "")){
        die("Enter all fields first.");                
    }
    else{
        //echo $_POST['station_name']."<br>"; To receive the value from JS

        $sql = "UPDATE ap_scale_test_bed SET ".
            "StationName = "."'$_POST[station_name]',"." IP = "."'$_POST[ip]',"." MAC = "."'$_POST[mac]'"." WHERE SNo = "."$_POST[sno]";
        echo $sql;      
        $retval = mysqli_query( $conn, $sql );         
        if(! $retval ) {
            die('Could not enter data: ' . mysql_error());
        }
        echo "Entered data successfully";
        mysqli_close($conn);
    }*/       

$_POST = json_decode(file_get_contents('php://input'));
$headers_count = sizeof($_POST);  

echo $tb;
$sql1 = "SHOW COLUMNS FROM "."$_POST[0]";
$retval1 = mysqli_query( $conn, $sql1 );
$col_names = array();
while($row = mysqli_fetch_assoc($retval1)) {
    array_push($col_names, $row['Field']);
        
} 

$sql  = "UPDATE "."$_POST[0]"." SET ";
for ($i = 1, $k = 0  ; $i <= sizeof($col_names); $i++, $k++){
    $sql1 = "$col_names[$k]"."="."'$_POST[$i]' ";
    if ($i != $headers_count - 1){
        $sql1 = "$sql1".",";
    }
    $sql = $sql.$sql1;
}
$sql = "$sql"." WHERE "."$col_names[0]"."="."'$_POST[1]'";


$retval = mysqli_query( $conn, $sql );

if(! $retval ) {
    die('Could not enter data: ' . mysql_error());
} 
echo "Edited data successfully";
mysqli_close($conn);
             

?>
