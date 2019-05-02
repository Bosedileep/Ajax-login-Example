<?php
        //create connection instance
        $con = new mysqli('remotemysql.com', '3VXMSb42mT', 'WPRy6CrPVE', '3VXMSb42mT', '3306');
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
            }
?>