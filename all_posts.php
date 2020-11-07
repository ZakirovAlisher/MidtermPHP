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
                         Update  Error
                        </div>       
                        <?php } ?>
                        <?php if(isset($_GET['success'])) {?>
                        <div class="alert alert-success" role="alert">
                          Update Completed
                        </div>     
                        <?php } ?>
                                        <?php
                                        
                                        $all_posts = getAllPosts();
                                        
                                      
                                            
                                            
                                          for ($i =0; $i<sizeof($all_posts); $i++){
                                            
                                                if(isset($_GET['keyword'])){
                                            $key = $_GET['keyword'];
                                            if (!strstr($all_posts[$i]['description'], $key ) && !strstr($all_posts[$i]['title'], $key) && !strstr($all_posts[$i]['full_text'], $key) ){
                                                
                                                continue;
                                                
                                            }
                                            
                                        }
                                              
                                              
                                            ?>
                                        <a href="comments.php?post_id=<?=$all_posts[$i]['id']?>">  
                                           <div class="card col-12 w-100 mb-3" style="width: 18rem; border: 1px solid lightgrey; border-radius: 5px;padding-top: 10px; padding-bottom: 15px">
        <p style="font-weight: bold; font-size: 22px"><?=  $all_posts[$i]['title']  ?></p>
        <span style="font-size: 16px;"><?=  $all_posts[$i]['description']  ?></span>
         
        <div class="card-body">
            <?=  $all_posts[$i]['full_text']  ?>
            
        </div>


            <div class="card-footer text-muted">
                <span style="font-size: 17px; color: #858585; ">Posted on <?=  $all_posts[$i]['post_date']  ?> </span><span style="font-size: 18px; color: #342fa3">by <a href="profile.php?id=<?=$all_posts[$i]['user_id']?>"><?= getUserId($all_posts[$i]['user_id'])['name']." ".getUserId($all_posts[$i]['user_id'])['surname']  ?></a></span>
            </div>
        
        
         <?php  if($_SESSION['user']['id']==$all_posts[$i]['user_id']) { ?>
        
         
        <button onclick="edit('<?=  $all_posts[$i]['title']  ?>','<?=  $all_posts[$i]['description']  ?>','<?=  $all_posts[$i]['full_text']  ?>',' <?=  $all_posts[$i]['id']  ?>' )" type="button" class="row btn btn-success btn-sm  ml-2" data-toggle="modal" data-target="#edModal">
                EDIT
            </button>
        
        
         <?php }?>
                                
                                            
                                            
    </div>
                                        </a>                               
                                        
                                        
                                        
                                            
                                            
                                            <?php 
                                           }
                                            
                                            ?>
                                      
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                        
				</div>
			</div>
		</div>
	</div>	
</body>

  <div class="modal fade" id="edModal" tabindex="-1" aria-labelledby="edModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="edModalLabel">Edit post</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true"></span>
                            </button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <form action="edit_post.php" class="w-100" method="post">
                                
                                  Title:
                    <div class="form-group w-100"> <input id="t" class="w-100" type="text" name="title"></div>
                    Description:
                    <textarea id="d" name="desc" class="w-100"></textarea>
                    Content:
                    <textarea id="c" name="full" class="w-100"></textarea>
                    
                    <input type="hidden" name="post_id" id="i" >
                     
                 
                               
                                <button type="submit" class="btn btn-danger float-right">SAVE</button>
                                <button type="submit" name="del" class="btn btn-secondary float-right"  >DELETE</button>


                            </form>
                        </div>

                    </div>
                </div>
            </div>
<script>
    function edit(t,d,f,id){

        document.getElementById("t").value = t; 
        document.getElementById("d").innerText = d; 
        document.getElementById("c").innerText = f;
         document.getElementById("i").value = id;
    }
</script>
</html>
<?php }
else{
	header('Location:login.php');
	}
 ?>
