<?php 
	$conn = mysqli_connect("localhost", "root", "","php_dev");
	if ($conn){
	mysqli_query($conn,"SET NAMES 'utf8' ");
	
	}else{
	echo "Bạn kết nối thất bại".mysqli_connect_error();
	}
?>
