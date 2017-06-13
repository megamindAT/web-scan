<?php
class PostView{
	public function showAllPost($posts){

		require_once('templates/Post.php');
		
	
	}
	
	public function login($success){
		if ($success == 0) {
			
		
			require_once('templates/login.php');
		}else{
			require_once('templates/Post.php');
		}
	}

	

}

?>
