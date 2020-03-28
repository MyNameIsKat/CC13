<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "user_db";
	$conn = new mysqli($host,$user,$password,$db);
	
	//GET VALUES
	
		//CHECK FOR CONNECTION ERRORS
		if(mysqli_connect_error()){
			die('Connection Error('.mysqli_connect_errno().')'.mysqli_connect_error());	
		}else{
			
			$username = $_POST["username"];
			$password = $_POST["password"];
				//PROCEED WITH QUERY
				$sql = "SELECT * FROM loginform WHERE username='".$username."' AND password ='".$password." 'LIMIT 1";
				if($result = mysqli_query($conn,$sql)){
					$rowcount = mysqli_num_rows($result);
					
					if($rowcount == 1){
						include "homepage.html";
					}else{
						include "Login_error.html";
					}
				}else{
					echo "Error:".$sql."".$conn->error;
				}
			
			
		}
	
	$conn->close();
	
	
?>