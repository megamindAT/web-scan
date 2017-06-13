<?php
class PostModel{
	public function connect(){
		$link = mysqli_connect("127.0.0.1", "root", "zxcvacdf", "dbscan");
	   if (!$link) {
	   	echo "Error: Unable to connect to MySQL." . PHP_EOL;
   	    	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
   	 	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    	 	exit;
		}
		return $link;
	}

	public function Getpost(){
	   
		$link = $this->connect();

		$result = $link->query('SELECT * FROM ip');
		$posts = array();
		
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
   	 		$posts[] = $row;
			}
		}
		// print_r($posts);
		return $posts;

	}

	public function Delete($item){
		$link = $this->connect();
		 
		$sqld = "DELETE FROM `ip` WHERE `ip`.`ip` = '".$item."'";
		$rs = $link->query($sqld);
		if ($rs) {
			echo "delelte success";
			$reload = 1 ;
			
		}
		echo $reload;
		//return $reload;


	}


}
?>
