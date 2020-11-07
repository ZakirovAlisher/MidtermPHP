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
                                        
                                        
                                        
                                         <?php
                                        $all_posts = getMsgs($user['id']);
                                        
                                         echo "You have ".sizeof($all_posts)." messages!" ;
  
                                          for ($i =0; $i<sizeof($all_posts); $i++){
                                            
                                            ?>
    <div class="card">
        
        <div class="card-header bg-success">
            From   <a href="profile.php?id=<?=$all_posts[$i]['from_id']?>"><?= getUserId($all_posts[$i]['from_id'])['name']." ".getUserId($all_posts[$i]['from_id'])['surname'] ?></a>
  </div>
            <div class="card-header">
         <?= $all_posts[$i]['title'] ?>
  </div>
  <div class="card-body">
    <?=   $all_posts[$i]['message'] ?>
  </div>
        
        <div class="card-footer">
            
          <?= $all_posts[$i]['msg_date'] ?>  
        </div>  
        
</div>
        
         
                                        
                                        
                                        
                                        
                                            
                                            
                                            <?php 
                                           }
                                            
                                            ?>
                                       
                                        
                                        
                                    
                                        
                                        
                                        
                                        
                                        
                                        
                                        
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
