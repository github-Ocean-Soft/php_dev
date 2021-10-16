//create database
<?php
	
//kết nối đến mysql
$link = mysqli_connect("localhost", "root", "");

// Kiểm tra kết nối
if($link === false){
    die("ERROR: Kết nối thất bại. " . mysqli_connect_error());
}

// Thực hiện tạo CSDL
$sql = "CREATE DATABASE php_dev";
if(mysqli_query($link, $sql)){
    echo "Tạo CSDL thành công!";
} else{
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($link);
}
  
// Đóng kết nối

?>