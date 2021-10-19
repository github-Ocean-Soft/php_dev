<?php	
//(user là 'root',pass" ")
$link = mysqli_connect("localhost", "root", "", "php_dev");
  
// Thực thi tạo bảng CSDL trong MySQL
$sql = "CREATE TABLE sanpham (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(500) NOT NULL,
    description TEXT(500) NOT NULL,
    image VARCHAR(500) NOT NULL,
    status int(10),
    create_at date DEFAULT NULL,
    update_at date DEFAULT NULL
)";
mysqli_query($link, $sql);

  
// Đóng kết nối
mysqli_close($link);
?>