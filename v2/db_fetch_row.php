<?php include "db/db_connect.php"; ?>
<?php include "insert.php"; ?>
<?php include "delete.php"; ?>
<?php include "change.php"; ?>
<?php
   
   $sql = 'SELECT * FROM ap_scale_test_bed';
   //mysql_select_db('test');
   $retval = mysqli_query($conn, $sql );
   $buf;
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   echo "<table id='t01' border='1'>". 
        "<tr>".
        "<th></th>".
        "<th>SNo</th>".
        "<th>Station Name</th>".
        "<th>IP Address</th>".
        "<th>MAC Address</th>".
        "</tr>";
   while($row = mysqli_fetch_assoc($retval)) {
    $buf = $row['SNo'] +1 ;
    echo "<tr>"; 
    echo "<td><input size=25 type='checkbox'></td>".
         "<td name='sno'>".$row['SNo']."</td>".
         "<td input size=25 type='text' id='station_name".$row['SNo']."' name='station_name".$row['SNo']."' contenteditable='true'>".$row['StationName']."</td>".
         "<td input size=25 type='text' id='ipaddress".$row['SNo']."' name='ip".$row['SNo']."' contenteditable='true'>".$row['IP']."</td>".
         "<td input size=25 type='text' id='macaddress".$row['SNo']."' name='mac".$row['SNo']."' contenteditable='true'>".$row['MAC']."</td>".
         "</tr>";
   }

   mysqli_close($conn);
   echo "</table>";
?>
<html>
       <tr>
        <td width = "250"></td>
        <td><button name = "add" id = "add" value = "Add" onclick="insertData()">ADD</button></td>
        <td><button name = "delete" id = "delete" value = "Delete" onclick="deleteData()">DELETE</button></td>
        <!--<td><button name = "edit" id = "edit" onclick="changeData()">EDIT</button></td>-->
        <td><button name = "save" id = "save" onclick="changeData()">SAVE</button></td>
    </tr>

</html>