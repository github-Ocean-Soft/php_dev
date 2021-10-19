<?php
	
//kết nối đến mysql
$link = mysqli_connect("localhost", "root", "");
// Thực hiện tạo CSDL
$sql = "CREATE DATABASE php_dev";
mysqli_query($link, $sql);
?>