<?php
class PostController{
	public function Getpost(){
		require_once('models/PostModels.php');
		$postModel = new PostModel();
		$posts = $postModel->Getpost();
		require_once('views/Postview.php');
		$postView = new PostView();
		$postView->showAllPost($posts);
	
  }
  	public function UpLoad(){
  		if(isset($_POST["submit"])){ 
			
  			if ($_FILES["fileToUpload"]['type'] != 'text/plain') {
 			echo "<span>File could not be accepted ! Please upload any '*.txt' file.</span>";
 			exit();
 			}
			$FileType = pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
			if($FileType == "txt" ) {
 				$content = $_FILES['fileToUpload']['tmp_name'];
				require_once('models/PostModels.php');
				$postModel = new PostModel();
				$postModel->Handerdb($content);
			}
		}
		

  	}
  	public function Delete(){
  		
  		if (isset($_GET['item'])) {

  			if (preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/', $_GET['item'])) {
  				$item = trim($_GET['item']);
  				require_once('models/PostModels.php');
				$postModel = new PostModel();
				$postModel->Delete($item);
				echo $reload;
				
		  	}
  			//echo $item;
  		}
  		
		


  	}
  	public function Login(){
  		require_once('views/Postview.php');
		$postView = new PostView();
		$postView->login();
		
  		if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['password'])) {
  			$username = $_POST['username'];
  			$password = $_POST['password'];
  			
  			$login = array('username' => $username,
  							'password' => $password,
  							);
  			

			require_once('models/PostModels.php');
			$postModel = new PostModel();
			$postModel->Login($login);
			
 
            
            }
  		
  	}
  	public function LogOut(){
  		unset($_SESSION["username"]);
  		unset($_SESSION["role"]);
  		header("Location: /");

  	}

}
?>
