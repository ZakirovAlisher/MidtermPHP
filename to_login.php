<?php  
	$url="login.php?error";
	print_r($_POST);
	if($_SERVER['REQUEST_METHOD']=='POST'){
		if(isset($_POST['email'])&&isset($_POST['password'])){
			require_once 'db.php';
			$user=getUser($_POST['email']); 
			if($user!=null){
				if($user['password']==$_POST['password']){
                                    
				session_start();
                                
				$_SESSION['user']=$user;
                                
                                
                                
                                if($_POST['remember'] == 1){
					setcookie('user_email', $user['email'], time()+60*60);
					setcookie('user_password', $user['password'], time()+60*60);
                                }
                                        
                                        
				$url="index.php";
				}
			}
		}
	}
	header("Location:$url");
?>