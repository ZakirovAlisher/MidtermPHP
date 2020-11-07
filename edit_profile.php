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
					<?php
						if(isset($_GET['error'])){
					?>
						<div class="alert alert-danger" role="alert">
						  Error on update!!!
						</div>
					<?php
						}
					?>
					<?php
						if(isset($_GET['success'])){
					?>
						<div class="alert alert-success" role="alert">
						  Update completed successfully!!!
						</div>
					<?php
						}
					?>
					<h3 class="">Edit profile</h3>
					<form action="to_changeprofile.php" method="post">
						<div class="form-group">
							<label for="">Name:</label>
							<input type="text" name="name" class="form-control" value="<?php echo $_SESSION['user']['name'];?>">
						</div>
						<div class="form-group">
							<label for="">Surname:</label>
							<input type="text" name="surname" class="form-control" value="<?php echo $_SESSION['user']['surname'];?>">
						</div>
						
                                            
                                  <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">City</label>
                                    <div class="col-md-9">
                                        <select  class="form-control" name="city" >
                                            <?php 
                                            require_once 'db.php';
                                            $cities = getCities();
                                           for ($i =0; $i<sizeof($cities); $i++){
                                            
                                            ?>
                                            
                                            <option <?php if($_SESSION['user']['city_id']==$cities[$i]['id']) echo "selected "; ?> value="<?=$cities[$i]['id'] ?>"> <?=$cities[$i]['name'] ?></option>
                                            
                                            <?php 
                                           }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                   <div class="form-group">
                                    <label for="lastname" class="col-md-3 control-label">Gender</label>
                                    <div class="col-md-9">
                                        <select  class="form-control" name="gender"   >
                                            <?php 
                                            
                                            $cities = getGenders();
                                           
                                           for ($i =0; $i<sizeof($cities); $i++){
                                            
                                            ?>
                                            
                                            <option <?php if($_SESSION['user']['gender_id']==$cities[$i]['id']) echo "selected "; ?> value="<?=$cities[$i]['id'] ?>"> <?=$cities[$i]['name'] ?></option>
                                            
                                            <?php 
                                           }
                                            
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                        <div class="form-group">
							<input type="submit" class="btn btn-primary" value="UPDATE PROFILE">
						</div>    
					</form>
					<h3 class="">Edit password</h3>
					<form action="to_changepassword.php" method="post">
						<div class="form-group">
							<label for="">Old password:</label>
							<input type="password" name="old_password" class="form-control" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="">New password:</label>
							<input type="password" name="new_password" class="form-control" placeholder="New password">
						</div>
						<div class="form-group">
							<label for="">Confirm new password:</label>
							<input type="password" name="confirm_new_password" class="form-control" placeholder="Confirm new password">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" value="UPDATE PASSWORD">
						</div>
					</form>
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
