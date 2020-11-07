<?php
	
	$uri = "index.php";

	if($_SERVER["REQUEST_METHOD"]=="POST"){

		$uri = "edit_profile.php?error";

		session_start();

		if(isset($_SESSION['user'])){

			if(isset($_POST["name"])&&isset($_POST["surname"])&&isset($_POST["city"])&&isset($_POST["gender"])){

				require_once "db.php";

				updateProfile($_POST['name'],$_POST['surname'],$_SESSION['user']['id'],$_POST["city"],$_POST["gender"]);
				
                                $_SESSION['user']['name'] = $_POST['name'];
				$_SESSION['user']['surname'] = $_POST['surname'];
                                $_SESSION['user']['city_id'] = $_POST["city"];
                                $_SESSION['user']['gender_id'] = $_POST["gender"];
                                        
				$uri = "edit_profile.php?success";

			}

		}

	}


	header("Location:$uri");

?>