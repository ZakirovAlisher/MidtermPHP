<?php  
	$uri="?error";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['title'])&&isset($_POST['desc'])&&isset($_POST['full'])&&isset($_POST['user_id']) ){
			require_once 'db.php';
			 
				addPost( $_POST['user_id'],$_POST['title'],$_POST['desc'],$_POST['full']);
				$uri="?success";
			 
		}
	}
	header("Location:index.php$uri");
?>