<?php
	session_start();
	if(isset($_SESSION['user'])){
		$user=$_SESSION['user'];
	require_once 'db.php';
?>
<?php include('header.php'); ?>

	<div class="main">
		<div class="container">
			<div class="row mt-3">
				<div class="col-md-3">
					
					<?php include('left.php'); ?>
				</div>
				<div class="col-md-9">
					
					<h6><?php echo "Welcome ".$user['surname']." ".$user['name']; ?></h6>
                                         <?php if(isset($_GET['error'])) {?>
                        <div class="alert alert-danger" role="alert">
                         Add  Error
                        </div>       
                        <?php } ?>
                        <?php if(isset($_GET['success'])) {?>
                        <div class="alert alert-success" role="alert">
                          Post Added
                        </div>     
                        <?php } ?>
				</div>
			</div>
		</div>
	</div>	
</body>



</html>
<?php }
else{
	header('Location:login.php');
	}
 ?>
