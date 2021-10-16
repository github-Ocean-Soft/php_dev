<?php	
//(user là 'root',pass" ")
$link = mysqli_connect("localhost", "root", "", "php_dev");
  
// Kiểm tra kết nối
if($link === false){
    die("ERROR: Không thể kết nối. " . mysqli_connect_error());
}else{
	echo"Kết nối thành công";
}
  
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
if(mysqli_query($link, $sql)){
    echo "Tạo bảng thành công.";
} else{
    echo "ERROR: Không thể thực thi $sql. " . mysqli_error($link);
}
  
// Đóng kết nối
mysqli_close($link);
?>