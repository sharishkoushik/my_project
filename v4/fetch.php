<?php include "db/db_connect.php"; ?>
<?php include "table_functions.php"; ?>
<?php
    
   $tb = $_GET['table_name'];
   $sql = "SELECT * FROM "."$tb";
   $retval = mysqli_query($conn, $sql );
   $buf;
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }        

    $sql1 = "SHOW COLUMNS FROM "."$tb";
    $retval1 = mysqli_query( $conn, $sql1 );
    $col_names = array();
    while($row = mysqli_fetch_assoc($retval1)) {
    array_push($col_names, $row['Field']);
        
    } 
    echo "<p id='tablename'>".$tb."</p>";
    $table_str = "<table id='t01' border='1'>". 
                "<tr>".
                "<th></th>";
    for($i=0 ; $i < sizeof($col_names) ; $i++){
        $table_str = "$table_str"."<th>".$col_names[$i]."</th>";
    }
    $table_str = "$table_str"."</tr>";
    echo $table_str;
    while($row = mysqli_fetch_assoc($retval)) {
        $buf = $row[$col_names[0]]  ;
        $tsr = "<tr>". 
           "<td><input size=25 type='checkbox' id='row".$buf."c0' class='row".$buf."'></td>";
        for($i = 0; $i < sizeof($col_names); $i++){
            $colid = $i + 1;
            $tsr = "$tsr"."<td input size=25 type='text' id='r".$buf."c".$colid."' class='row".$buf."'>".$row[$col_names[$i]]."</td>";
        }
        echo $tsr;    
    }
    $buf  = $buf + 1;
    $tsr1 = "<tr>".
            "<td><input size=25 type='checkbox' id='row".$buf."c0' class='row".$buf."'></td>";
    for($i = 0; $i < sizeof($col_names) ; $i++){
        $colid = $i + 1;
        $tsr1 = "$tsr1"."<td><input type='text' id='r".$buf."c".$colid."' class='row".$buf."'></td>";
    }
    $tsr1= "$tsr1"."</tr>";
    echo $tsr1;
    
   mysqli_close($conn);
   echo "</table>";
?>
<html>
    <tr>
        <td width = "250"></td>
        <td><button name = "add" id = "add" value = "Add" onclick="insertData()">ADD</button></td>
        <td><button name = "delete" id = "delete" value = "Delete" onclick="deleteData()">DELETE</button></td>
        <td><button name = "edit" id = "edit" onclick="editData()">EDIT</button></td>
    </tr>
<p id="demo"></p>
</html>