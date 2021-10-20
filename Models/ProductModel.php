<?php
	trait ProductModels{
		public function read(){
			$conn=Connection::getConnect();
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
			$conn=Connection::getConnect();
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
			$conn=Connection::getConnect();
			$id 	= $_GET['id'];
			$result = $conn->query("delete from sanpham where id ='$id'")or die("Lỗi truy vẫn");
		}
		public function edit(){
			$conn=Connection::getConnect();
			$id=$_GET['id'];
			$query=mysqli_query($conn,"select * from `sanpham` where id='$id'");
			$row=mysqli_fetch_assoc($query);
			return $row;
		}
		public function editpost(){
			$conn=Connection::getConnect();
			$row=$this->edit();
			if (isset($_POST['Update'])) {

			$id 	= $_GET['id'];
			$title	= $_POST['title'];
			$descrip= $_POST['description'];
			
			if($_FILES["image"]["name"] == ""){
				$photo = $row['image'];
			
			}else{
				$photo = $_FILES["image"]["name"];
				move_uploaded_file($_FILES["image"]["tmp_name"],"static/$photo");
			}

			$status	= $_POST['status'];	
			$sql  	="update sanpham set title = '$title',description='$descrip', image='$photo',status='$status' where id='$id'" ;
			$result = $conn->query($sql);
			header("location:index.php");
			}
		}
		public function userpost(){
		    $id=$_GET['id'];
		    $conn=Connection::getConnect();
		    $sql    = "SELECT *FROM sanpham where id ='$id'";
		    $result = $conn->query($sql);
		    return $result;
		}
		public function paginator(){
			$conn=Connection::getConnect();
		    
		    $query=mysqli_query($conn,"select * from `sanpham` ");
		    $arr=array();
		    while ($row=mysqli_fetch_assoc($query)) {
		        $arr[]=$row;
		    }
		    $count   =  count($arr);
		    $grouppage=5;
		    $page    = ceil($count/$grouppage);
		    return $page;
		}

	}	
?>