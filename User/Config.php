<?php
$host="localhost";
$username="root";
$password=null;
$dbname="mydb";
$conn=new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
// echo "connet<br>";
?>