<?php
define("DBHOST","127.0.0.1");
define("DBUSER","root");
define("DBPASS", "");

$conn = new mysqli(DBHOST, DBUSER, DBPASS);
if ($conn->connect_error) {
    die("Connection Failed: ".$conn->connect_error);
} else {
    $sql_db = "CREATE DATABASE USER_DATA";
    if ($conn->query($sql_db) === TRUE) {
        define("DBNAME", "USER_DATA");
        $conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
        if ($conn->connect_error) {
            die("Connection to Database Failed: ".$conn->connect_error);
        } else {
            $sql_table = "CREATE TABLE users(
                id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                First_Name TEXT(50) NOT NULL,
                Surname TEXT(50) NOT NULL,
                Gender TEXT(10),
                Dob VARCHAR(12),
                Username VARCHAR(30) NOT NULL,
                Email VARCHAR(50),
                Create_Password VARCHAR(50),
                Confirm_Password VARCHAR(50),
                Country VARCHAR(30),
                Phone_No VARCHAR(15),
                Reg_Time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                
                
                
                )";

                if ($conn->query($sql_table) === FALSE) {
                    echo "Unable to create table".$conn->error;
                }
        }
    }
}

$conn->close();
?>