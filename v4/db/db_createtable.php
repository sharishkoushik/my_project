<?php include "db_connect.php";?>
<?php         


$_POST = json_decode(file_get_contents('php://input'));
$headers_count = sizeof($_POST);
        
        /*$sql = "CREATE TABLE apstb (".
            "'$_POST[header1]' int(11) not null primary key, '$_POST[header2]' varchar(50), ". "'$_POST[header3]' varchar(50), '$_POST[header4]' varchar(50), '$_POST[header5]' varchar(50))";*/

$sql  = "CREATE TABLE ".$_POST[0]." (SerialNo int(11) NOT NULL PRIMARY KEY, ";
for ($i = 1 ; $i < $headers_count; $i++){
    $sql1 = "$_POST[$i] varchar(50)";
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
echo "Table created successfully";
mysqli_close($conn);
             
 
?>
