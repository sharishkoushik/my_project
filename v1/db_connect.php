<?php
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = 'mysqlpassword';
        $dbname = 'test';
        $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
         
        if(! $conn ) {
            die('Could not connect: ' . mysql_error());
        }

?>