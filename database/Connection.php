<?php
	class Connection{
		public static function getConnect(){
			try {
				@$conn = mysqli_connect("localhost", "root","", "php_dev");
			} catch (Exception $e) {
				echo 'a',  $e->getMessage(), "\n";
			}finally{
				if ($conn){
					$conn = mysqli_connect("localhost", "root","", "php_dev");
					return $conn;
				}else{
					include "database/create_database.php";
					include "database/create_table.php";
					$conn = mysqli_connect("localhost", "root","", "php_dev");
					return $conn;	
				}	
			}
		}
	}
?>