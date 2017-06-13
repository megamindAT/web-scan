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
	public function Handerdb($content){
		$link = $this->connect();

    	
    	$file = fopen($content,"r") or exit("Unable to open file!");
  		while(!feof($file)) {
  			$string =  trim(fgets($file));
  			
  			if (preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/', $string)) {
  				// insert to data 
  				$sql = "SELECT 1 FROM ip WHERE ip = '". $string."'" ;
  				$check = $link->query($sql);
  				if ($check->num_rows == 0 ) {
  					$sqli = "INSERT INTO ip (ip, status, port, vtf, user) VALUES ('".$string."', NULL, NULL, NULL, '".$_SESSION['username']."')";
  					$link->query($sqli);
  					
  				}
  				// end insert to data 
  				// ping start 
  				$cmd = "ping -w 1 ".$string. " ; echo $? ";

  				$output = exec($cmd);
  				if ($output == 0) {
  					$sqlu = "UPDATE `ip` SET `status` = 'up' WHERE `ip`.`ip` = '".$string."'";
  					$link->query($sqlu);
  							
  				}
  				else{
  					$sqlu = "UPDATE `ip` SET `status` = 'down' WHERE `ip`.`ip` = '".$string."'";
  					$link->query($sqlu);
  					
  				}
  				//end ping 


  				//nmap start 
  				$comm = "nmap -F ". $string ." --open|  awk '{print $1}' | grep -o '[0-9]*'| tail ";
  				//$noutput = exec($comm) ;

  				if( ($fp = popen($comm, "r")) ) {
				    while( !feof($fp) ){
				        $a = fread($fp, 1024);
				        $noutput = trim($a);
				        if($noutput !=''){
					        $sqlnm = "UPDATE `ip` SET `port` = '".$noutput."' , `status` = 'up' WHERE `ip`.`ip` = '".$string."'";
	    					$link->query($sqlnm);
	    					
		  				
		  				}
    					
				        flush(); 
				    }
				    fclose($fp);
				}
				//end nmap 
				
  			}
  		}
    	
		

	}
	public function Delete($item){
		$link = $this->connect();
		if ($_SESSION['username'] == 'admin') {
		
			$sqld = "DELETE FROM `ip` WHERE `ip`.`ip` = '".$item."'";
						
		}else{
			$sqld = "DELETE FROM `ip` WHERE `ip`.`ip` = '".$item."' AND `ip`.`user` = '".$_SESSION['username']."'";
		}

		$rs = $link->query($sqld);
		if ($rs) {
			
			$rel = 1 ;
			
		}
		header('Location: /');
		return $rel;



	}

	public function Login($login){
		$link = $this->connect();

		if (isset($login)){
			//$sqlsu = "SELECT * FROM user WHERE username = '".$login['username']."'";
			$fuck = "SELECT * FROM user WHERE username = '".$login['username']."' AND pass = '".$login['password']."'";
			$resultl = $link->query($fuck);

			if ($resultl->num_rows > 0) {
                $resultl = $resultl->fetch_assoc();                
				if ($login['password'] == $resultl['pass']) {
                    
					$_SESSION['valid'] = true;
	                $_SESSION['role'] = $resultl['role'];
	                $_SESSION['username'] = $login['username'];
                    header('Location: /');
	                return $success = 1 ;

				}else{
					//deos login
					return $success = 0;

				}
			}else{
				return $success =0;
			}
		
        }     

	}


}
?>
