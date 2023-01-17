<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "b3_hospital";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if(!$conn){
    die("Failed to connect database".mysqli_connect_error());
}
date_default_timezone_set("Asia/Bangkok");

?>