<?php
    class DBconnect{
        function __construct(){
        }
        function connect(){
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "college_campus";
            $conn = new mysqli($servername,$username,$password,$dbname);
            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                exit;
            }
            return $conn;
        }
    }
?>