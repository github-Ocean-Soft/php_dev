<?php
	trait ProductModels{
		//read
		// $a=0;
		
		public function read(){
			include "database/Connection.php";
			
			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			}
			else{
				$page=1;
			}
			$row =5;
			$from 	= ($page - 1)* $row;//vị trí lấy ra bản ghi
			$sql    = "SELECT *FROM sanpham limit $from,$row ";
			$result = $conn->query($sql);
			return $result;
		}
		public function add(){
			include "database/Connection.php";
			if (isset($_POST['subm'])) {
			$title 		= $_POST['title'];
			$description= $_POST['description'];
			
			$photo= "";
			if($_FILES["image"]["name"] != ""){
				
				$photo = $_FILES["image"]["name"];
				//thuc hien upload file
				move_uploaded_file($_FILES["image"]["tmp_name"],"static/$photo");
			}

			$status		= $_POST['status'];	
			$sql 		= "insert into sanpham(title,description,image,status) 
			values('$title','$description','$photo','$status') ";
			$result = $conn->query($sql);
			
			header("location:index.php");
			}
		}
		public function delete(){
			include "database/Connection.php";
			$id 	= $_GET['id'];
			$result = $conn->query("delete from sanpham where id ='$id'")or die("Lỗi truy vẫn");
		}
		public function edit(){
			include "database/Connection.php";
			if (isset($_POST['Update'])) {
			$conn = new mysqli("localhost", "root", "", "php_dev");
			// Check connection
			if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			}

			$id 	= $_GET['id'];
			$title	= $_POST['title'];
			$descrip= $_POST['description'];
			
			if($_FILES["image"]["name"] != ""){
			$photo = $_FILES["image"]["name"];
			//thuc hien upload file
			move_uploaded_file($_FILES["image"]["tmp_name"],"static/$photo");
			}
			$status	= $_POST['status'];	
			$sql  	="update sanpham set title = '$title',description='$descrip', image='$photo',status='$status' where id='$id'" ;
			$result = $conn->query($sql);
			header("location:index.php");
			}
		}
	
		
	}	
?>