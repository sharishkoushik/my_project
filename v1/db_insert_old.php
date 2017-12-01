<html>

   <head>
      <title>Insert Records</title>
   </head>

   <body>
      <?php include "db_connect.php";?>
      <?php
         if(isset($_POST['add'])) {
             
            if(($_POST['station_name'] == "") || ($_POST['ip'] == "") || ($_POST['mac'] == "")){

                die("<h1 color='red'>Enter all fields first. </h1><br>");                
            }
            else{ 
                
                $sql = "INSERT INTO ap_scale_test_bed ".
                    "(StationName, IP, MAC) "."VALUES ".
                    "('$_POST[station_name]','$_POST[ip]', '$_POST[mac]')";
            
                $retval = mysqli_query( $conn, $sql );
         
                if(! $retval ) {
                    die('Could not enter data: ' . mysql_error());
                }
         
                echo "<h1>Entered data successfully</h1>\n";
                mysqli_close($conn);
            }
            
         } else {
      ?>
    
    <table id="t01" border="1">
      <tr>
        <th></th>
        <th>SNo</th>
        <th>Client Name</th>
        <th>MAC Address</th> 
        <th>IP Address</th>
      </tr>
      <tr>
        <td><input size=25 type="checkbox"></td>
        <td>1</td>
        <td><input size=25 type="text" id="station_name" name="station_name"/></td>
        <td><input size=25 type="text" id="ipaddress" name="ip"/></td>
        <td><input size=25 type="text" id="macaddress" name="mac"/></td>
      </tr>
    </table>        
    <tr>
        <td width = "250"> </td>
        <td><input name = "add" type = "submit" id = "add"  value = "Add"></td>
    </tr> 
       
   <?php
      }
   ?>
</body>
</html>
