<?php  
	$uri="?error";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['com'])&&isset($_POST['post_id']) ){
			require_once 'db.php';
			 
				addComment( $_POST['post_id'],$_POST['com'], $_POST['author_id']);
				$uri="?success";
			 
		}
	}
	header("Location:comments.php?post_id=".$_POST['post_id']);
?>