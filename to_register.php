<?php  
	$uri="?error";
	if($_SERVER['REQUEST_METHOD']=='POST'){
            
		if(isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['name'])&&isset($_POST['surname'])&&isset($_POST['city'])&&isset($_POST['gender']) ){
			 
                        require_once 'db.php';
                      
                        
			$user=getUser($_POST['email']);
                        
			if($user==null){
				addUser($_POST['email'],$_POST['password'],$_POST['name'],$_POST['surname'],$_POST['city'],$_POST['gender']);
				$uri="?success";
			}
		}
	}
	header("Location:register.php$uri");
?>