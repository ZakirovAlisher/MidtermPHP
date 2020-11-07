<?php  
	try {
		$connection=new PDO('mysql:host=localhost;dbname=sis_mid', 'root', '');
	} catch (PDOException $e) {
		echo $e->getMessage();
		
	}
	function addUser($email, $password, $name, $surname, $cid, $gid){
		global $connection;
		$query=$connection->prepare("INSERT INTO users(id, email, password, name, surname, city_id, gender_id) VALUES(NULL, :email,:password,:name,:surname,:cid,:gid)");
		$rows=$query->execute(array("email"=>$email, "password"=>$password,"name"=>$name,"surname"=>$surname, "cid"=> $cid, "gid"=>$gid));
		return $rows>0;
	}
        
        
        
        function addPost($id, $title, $desc, $full){
		global $connection;
		$query=$connection->prepare("INSERT INTO posts(id,user_id, title, description, full_text, post_date) VALUES(NULL, :uid,:t,:d,:ft, NULL)");
		$rows=$query->execute(array("uid"=>$id, "t"=>$title,"d"=>$desc,"ft"=>$full));
		return $rows>0;
	}
        
        
           function writeMsg($t, $msg, $to, $from){
		global $connection;
		$query=$connection->prepare("INSERT INTO messages(id,from_id,to_id,title,message,msg_date) VALUES(NULL, :fid,:tid,:t,:msg, NULL)");
		$rows=$query->execute(array("fid"=>$from, "tid"=>$to,"msg"=>$msg,"t"=>$t));
		return $rows>0;
	}
        
	function getUser($email){
		global $connection;
		$query=$connection->prepare("SELECT * FROM users where email=:email");
		$query->execute(array("email"=>$email));
		$result=$query->fetch();
		return $result;
	}
        
        function getUserId($email){
		global $connection;
		$query=$connection->prepare("SELECT * FROM users where id=:email");
		$query->execute(array("email"=>$email));
		$result=$query->fetch();
		return $result;
	}
        
        function getCity($id){
		global $connection;
		$query=$connection->prepare("SELECT * FROM cities where id=:id");
		$query->execute(array("id"=>$id));
		$result=$query->fetch();
		return $result;
	}
          function getGender($id){
		global $connection;
		$query=$connection->prepare("SELECT * FROM genders where id=:id");
		$query->execute(array("id"=>$id));
		$result=$query->fetch();
		return $result;
	}
        
	function updateProfile($name, $surname, $id, $cid, $gid){
		global $connection;
		$query=$connection->prepare("UPDATE users 
			SET name=:name,
				surname=:surname, city_id =:cid, gender_id=:gid
                                
				WHERE id=:id
			 ");
		$rows=$query->execute(array("name"=>$name, "surname"=>$surname,"id"=>$id,"cid"=>$cid,"gid"=>$gid));
		return $rows>0;
	}
        
         
        
        function updatePost($id, $title, $desc, $full){
		global $connection;
		$query=$connection->prepare("UPDATE posts 
			SET title=:t,
				description=:d, full_text=:ft
                                
				WHERE id=:id
			 ");
		$rows=$query->execute(array("t"=>$title, "d"=>$desc,"id"=>$id, "ft"=> $full));
		return $rows>0;
	}
          function delPost($id){
		global $connection;
		$query=$connection->prepare("DELETE from posts WHERE id=:id");
	 
		$rows=$query->execute(array("id"=>$id));
		return $rows>0;
	}
        
        
	function updatePassword($password, $id){
		global $connection;
		$query=$connection->prepare("UPDATE users 
			SET password=:password
				WHERE id=:id
			 ");
		$rows=$query->execute(array("password"=>$password,"id"=>$id));
		return $rows>0;
	}
	function deleteStudent($id){
		global $connection;
		$query=$connection->prepare("DELETE FROM tweets where user_id=:id");
		$rows=$query->execute(array("id"=>$id));
		return $rows>0;
	}
        
        function getGenders(){
		global $connection;
		$query=$connection->prepare("SELECT * FROM genders");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}
         function getCities(){
		global $connection;
		$query=$connection->prepare("SELECT * FROM cities");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}
        
         function getAllPosts(){
		global $connection;
		$query=$connection->prepare("SELECT * FROM posts ORDER by post_date DESC");
		$query->execute();
		$result=$query->fetchAll();
		return $result;
	}
        function getPost($id){
		global $connection;
		$query=$connection->prepare("SELECT * FROM posts WHERE id = :id");
		$query->execute(array("id"=>$id));
		$result=$query->fetch();
		return $result;
	}
        
        
        
         function getMyPosts($id){
		global $connection;
		$query=$connection->prepare("SELECT * FROM posts where user_id=:id");
		$query->execute(array("id"=>$id));
		$result=$query->fetchAll();
		return $result;
	}
            function getMsgs($id){
		global $connection;
		$query=$connection->prepare("SELECT * FROM messages where to_id=:id ORDER by msg_date DESC");
		$query->execute(array("id"=>$id));
		$result=$query->fetchAll();
		return $result;
	}
        
          function addComment($id, $com, $author_id){
		global $connection;
		$query=$connection->prepare("INSERT INTO comments(id, post_id, author_id, com) VALUES(NULL, :uid,:t,:d)");
		$rows=$query->execute(array("uid"=>$id, "d"=>$com,"t"=>$author_id));
		return $rows>0;
	}
        
           function getComments($id){
		global $connection;
		$query=$connection->prepare("SELECT * FROM comments where post_id=:id");
		$query->execute(array("id"=>$id));
		$result=$query->fetchAll();
		return $result;
	}
        
        
?>