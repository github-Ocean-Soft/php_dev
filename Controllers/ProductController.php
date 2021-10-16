<?php
	//lay duong dan tu Models
	include "Models/ProductModel.php";
	class ProductControllers{
		use ProductModels;
		public function __construct(){
			//lay action từ view
			$action = isset($_GET["action"])?$_GET["action"]:"admin";
			switch($action){
				default:
				// trỏ read() từ model và gán vào biến
				$result = $this->read();
				//in ra thông tin
				include "View/admin.php";
				break;
			case 'delete':
				$this->delete();
				header("location:index.php");
				break;	
			case 'add':
				//$result = $this->read();
				$this->add();	
				include "View/add.php"; 
				break;
			case 'Edit':
				include "View/Edit.php";
				$this->Edit();
				break;
			case 'userpost':
				include"View/userpost.php";
				break;
			case 'user':
				include "View/user.php";
			}
		}
	}
	new ProductControllers();
?>