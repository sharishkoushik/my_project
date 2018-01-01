<?php include "db_connect.php";?>
<?php
    //$_POST = json_decode(file_get_contents('php://input'));
    //$headers_count = sizeof($_POST); 

    echo $tb;
    $sql1 = "SHOW COLUMNS FROM "."$_POST[tbname]";
    $retval1 = mysqli_query( $conn, $sql1 );
    $col_names = array();
    while($row = mysqli_fetch_assoc($retval1)) {
        array_push($col_names, $row['Field']);    
    }
    
    $sql = "DELETE FROM "."$_POST[tbname]"." WHERE ".
    "$col_names[0]"."="."'$_POST[sno]'";
    
    $retval = mysqli_query( $conn, $sql );
    if(!$retval ) {
        die('Could not delete data: ' . mysql_error());
    }
    $sql = "SET @count = 0";
    $retval = mysqli_query( $conn, $sql );
    if(!$retval ) {
        die('Could not delete data: ' . mysql_error());
    }
    $sql = "UPDATE "."$_POST[tbname]". " SET "."$_POST[tbname]"."."."$col_names[0]". "= @count := @count +1";
    $retval = mysqli_query( $conn, $sql );
    if(!$retval ) {
        die('Could not delete data: ' . mysql_error());
    }
    echo "Data deleted successfully";
    mysqli_close($conn);
                 
?>
