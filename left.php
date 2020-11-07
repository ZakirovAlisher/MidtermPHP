<div class="bg-light border-right" id="sidebar-wrapper">
	<div style="height: 100px;" class="text-center">
		<a href="index.php"><img src="images/logo.png" width="100" alt=""></a>
	</div>

	<div class="list-group list-group-flush">
	<a href="index.php" class="list-group-item list-group-item-action bg-light">Home page</a>
	<a href="edit_profile.php" class="list-group-item list-group-item-action bg-light">Edit profile</a>
	<a href="#" data-toggle="modal" data-target="#edcModal" class="list-group-item list-group-item-action bg-light">Create post</a>
	<?php 
         $msgs = getMsgs($user['id']);
                                        
         
        
        ?>
        <a href="messages.php" class="list-group-item list-group-item-action bg-light"><?= sizeof($msgs) . " New "?>messages</a>
        <a href="profile.php?id=<?=$_SESSION['user']['id']?>" class="list-group-item list-group-item-action bg-light">See own posts</a>
        <a href="all_posts.php" class="list-group-item list-group-item-action bg-light">See all posts</a>
	<a href="logout.php" class="list-group-item list-group-item-action bg-light">Logout</a>
	</div>
</div>

<div class="modal fade" id="edcModal" tabindex="-1" aria-labelledby="addCModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCModalLabel">Add new post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> </span>
                </button>
            </div>
            <div class="modal-body">
  <form action="add_post.php" class="w-100" method="post">
                    
                    Title:
                    <div class="form-group w-100"> <input class="w-100" type="text" name="title"></div>
                    Description:
                    <textarea name="desc" class="w-100"></textarea>
                    Content:
                    <textarea name="full" class="w-100"></textarea>
                    
                    <input type="hidden" name="user_id" value="<?=$_SESSION['user']['id']?>" >
                     

                    <button type="submit" class="btn btn-danger float-right">ADD</button>
                    <button type="button" class="btn btn-secondary float-right" data-dismiss="modal">CANCEL</button>

                </form>
            </div>
            <div class="modal-footer">
              
            </div>
        </div>
    </div>
</div>