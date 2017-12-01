<?php include "insert.php"; ?>
<?php include "delete.php"; ?>
<?php include "edit.php"; ?>
<html>

   <head>
      <title>Insert Records</title>
   </head>

   <body>
    
    <table id="t01" border="1">
      <tr>
        <th></th>
        <th>SNo</th>
        <th>Station Name</th>
        <th>IP Address</th> 
        <th>MAC Address</th>
      </tr>
      <tr>
        <td><input size=25 type="checkbox"></td>
        <td name="sno">1</td>
        <td><input size=25 type="text" id="station_name1" name="station_name1" contenteditable='true'></td>
        <td><input size=25 type="text" id="ipaddress1" name="ip1" contenteditable='true'></td>
        <td><input size=25 type="text" id="macaddress1" name="mac1" contenteditable='true'></td>
      </tr>

</table>
    <tr>
        <td width = "250"> </td>
        <td><button name = "add" id = "add" value = "Add" onclick="insertData()">ADD</button></td>
        <td><button name = "delete" id = "delete" value = "Delete" onclick="deleteData()">DELETE</button></td>
        <td><button name = "edit" id = "edit" value = "Edit" onclick="editData()">EDIT</button></td>
    </tr> 
<!--<p id='demo'></p>
<p id='demo1'></p>
<p id='demo2'></p>
<p id='demo3'></p>-->
</body>
</html>