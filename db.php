<?php

$servername="localhost";
$username="root";
$password="";
$db_name="course_system";

$conn = new mysqli($servername,$username,$password,$db_name);

if($conn->connect_error){
    die("Connection failed");
}

?>