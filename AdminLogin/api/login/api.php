<?php 
 
	// connect to database
	$conn = mysqli_connect('localhost', 'root', '', 'multi_login');
	
	$response = array();
	$user = array();
	if (isset($_GET['apicall'])) {
		switch($_GET['apicall']){
			
			case 'signup':
				if(isTheseParametersAvailable(array('username','email','password','user_type'))){
					$username = $_POST['username']; 
					$email = $_POST['email']; 
					$password = md5($_POST['password']);
					$user_type = $_POST['user_type']; 
					
					$stmt = $conn->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
					$stmt->bind_param("ss", $username, $email);
					$stmt->execute();
					$stmt->store_result();
					
					if($stmt->num_rows > 0){
						$response['error'] = true;
						$response['message'] = 'User already registered';
						$stmt->close();
					}else{
						$stmt = $conn->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
						$stmt->bind_param("ssss", $username, $email, $password, $user_type);
 
						if($stmt->execute()){
							$stmt = $conn->prepare("SELECT id, username, email, user_type FROM users WHERE username = ?"); 
							$stmt->bind_param("s",$username);
							$stmt->execute();
							$stmt->bind_result($id, $username, $email, $user_type);
							$stmt->fetch();
							
							$user = array(
								'id'=>$id, 
								'username'=>$username, 
								'email'=>$email,
								'user_type'=>$user_type
							);
							// get id of the created user
							//$logged_in_user_id = mysqli_insert_id($conn);

							//$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
							
							$response['error'] = false; 
							$response['message'] = 'User registered successfully';
							$response['user'] = $user; 
							//$stmt->close();
						}
					}
					
				}else{
					$response['error'] = true; 
					$response['message'] = 'required parameters are not available';
				}
				
			break; 
			
			case 'login':	
				if(isTheseParametersAvailable(array('username', 'password', 'email'))){
					
					$username = $_POST['username'];
					$password = md5($_POST['password']); 
					$email = $_POST['email'];
					$stmt = $conn->prepare("SELECT id, username, email, user_type, flag FROM users WHERE username = ? AND password = ? AND email = ?");
					$stmt->bind_param("sss",$username, $password, $email);
					
					$stmt->execute();
					
					$stmt->store_result();
					
					if($stmt->num_rows > 0){
						
						$stmt->bind_result($id, $username, $email, $user_type, $flag);
						$stmt->fetch();
						
						$user = array(
							'id'=>$id, 
							'username'=>$username, 
							'email'=>$email,
							'user_type'=>$user_type,
							'flag'=>$flag
						);
						
						if ( $user['flag'] == 1 ){
							$response['error'] = true;
							$response['message'] = 'user deleted.';
						}else {
							$response['error'] = false; 
							$response['message'] = 'Login successfull';
							$response['id'] = $user['id'];
							$response['username'] = $user['username'];
						}
					}else{
						$response['error'] = true; 
						$response['message'] = 'Invalid username or password';
					}
				}
			break; 
			
			case 'savescan':
					$userid = $_POST['userid'];
					$companyname = $_POST['companyname'];
					$regno = $_POST['regno'];
					$trailerno = $_POST['trailerno'];
					$containerno = $_POST['containerno'];
					$isocode = $_POST['isocode'];
					$sealno = $_POST['sealno'];
					$loadstatus = $_POST['loadstatus']; 
					$isscan = $_POST['isscan'];
					$currentDate = date('Y-m-d');
					$currenttime = date('H:i:s');
					$query = "INSERT INTO scandata (companyname,regno,trailerno,containerno,isocode,sealno,loadstatus,scandate,scantime,isscan,userid) VALUES ('$companyname','$regno',
					'$trailerno','$containerno','$isocode','$sealno','$loadstatus','$currentDate','$currenttime','$isscan','$userid')";
					$result = mysqli_query($conn,$query);
					if($result){
						$response['error'] = false; 
						$response['message'] = 'save success';
					}else{
						$response['error'] = true; 
						$response['message'] = 'save failed';
					}
			break;
			
			default: 
				$response['error'] = true; 
				$response['message'] = 'Invalid Operation Called';
		}
		
	}else{
		$response['error'] = true; 
		$response['message'] = 'Invalid API Call';
	}
	
	function isTheseParametersAvailable($params){
		
		foreach($params as $param){
			if(!isset($_POST[$param])){
				return false; 
			}
		}
		return true; 
	}

	echo json_encode($response);
?>