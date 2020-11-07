<?php  
	$uri="?error";
	if($_SERVER['REQUEST_METHOD']=='POST'){
            
            require_once 'db.php';
            
            if(isset($_POST['del'])){
                delPost($_POST['post_id']);
                $uri="?success";
                
            }
            else
            
            
		if(isset($_POST['title'])&&isset($_POST['desc'])&&isset($_POST['full'])&&isset($_POST['post_id']) ){
			
                   
				updatePost( $_POST['post_id'],$_POST['title'],$_POST['desc'],$_POST['full']);
				$uri="?success";
                                 var_dump($_POST);
			 
		}
                
                
                
                
                
                
                
	}
        
	header("Location:all_posts.php$uri");
?>