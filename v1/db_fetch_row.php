<?php
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = 'mysqlpassword';
   
   $conn = mysql_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysql_error());
   }
   
   $sql = 'SELECT * FROM ap_scale_test_bed';
   mysql_select_db('test');
   $retval = mysql_query( $sql, $conn );
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   echo "<table border='1'>". 
        "<tr>".
        "<th>SNo</th>".
        "<th>Station Name</th>".
        "<th>IP Address</th>".
        "<th>MAC Address</th>".
        "</tr>";
   while($row = mysql_fetch_assoc($retval)) {
    echo "<tr>"; 
        echo "<td align='center'>".$row['SNo']."</td>". 
             "<td align='center'>".$row['StationName']."</td>".
             "<td align='center'>".$row['IP']."</td>".
             "<td align='center'>".$row['MAC']."</td>";
   }
   echo "</table>";
   
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
?>