<?php
$servername = "localhost:3306";
$username = "root";
$password = "root";
$dbname = "php_db";



// 数据库连接本地
$conn = new mysqli($servername, $username, $password, $dbname,);

if ($conn->connect_error) {// 检查连接
    die("Connection failed: " . $conn->connect_error); 
}

