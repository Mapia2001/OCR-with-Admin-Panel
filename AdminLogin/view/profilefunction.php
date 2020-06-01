<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'multi_login');

	$actionname    =  $_POST['actionname'];
	if($actionname == "displaydata"){
		if (isset($_POST['actionnamedis']) && $_POST['actionnamedis'] == "usernameprofile"){
			$userid = $_POST['disuserid'];
			$query = "SELECT * FROM userprofile WHERE userid='$userid'";
			$results = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($results);
			if(isset($user) && count($user) > 0){
				$user['info'] = true;
				echo json_encode($user);
			}else{
				echo json_encode(array('info'=>false));
			}
		} else {
			$query = "SELECT * FROM userprofile WHERE userid={$_SESSION['user']['id']}";
			$results = mysqli_query($db, $query);
			$user = mysqli_fetch_assoc($results);
			if(isset($user) && count($user) > 0){
				$user['info'] = true;
				echo json_encode($user);
			}else{
				echo json_encode(array('info'=>false));
			}
		}
		
	}else if($actionname == "savedata"){
		$refno    =  $_POST['refno'];
		$companyname   =  $_POST['companyname'];
		$address  = $_POST['address'];
		$tellno  =  $_POST['tellno'];
		$eaddress1  =  $_POST['eaddress1'];
		$eaddress2  =  $_POST['eaddress2'];
		$eaddress3  =  $_POST['eaddress3'];
		$ownernametell  =  $_POST['ownernametell'];
		$notes  =  $_POST['notes'];
		$userid = 0;
		if (isset($_POST['actionnamedis']) && $_POST['actionnamedis'] == "adminedit"){
			$userid = $_POST['userid'];
		}else{
			$userid = $_SESSION['user']['id'];
		}
		$query = "SELECT * FROM userprofile WHERE userid='$userid'";
		$results = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($results);
		if(isset($user) || count($user) > 0){
			$query = "UPDATE userprofile SET refno='$refno',companyname='$companyname',address='$address',tellno='$tellno',eaddress1='$eaddress1',eaddress2='$eaddress2',eaddress3='$eaddress3',ownernametell='$ownernametell',notes='$notes' WHERE userid='$userid'";
			mysqli_query($db, $query);
		}else{
			$query = "INSERT  INTO userprofile (refno,companyname,address,tellno,eaddress1,eaddress2,eaddress3,ownernametell,notes,userid) VALUES('$refno','$companyname','$address','$tellno','$eaddress1','$eaddress2','$eaddress3','$ownernametell','$notes','$userid')";
			mysqli_query($db,$query);
		}
		echo json_encode(array('info' => true));	
	}else if($actionname == "displayall"){
		$query = "SELECT b.username AS username, a.* FROM userprofile AS a RIGHT JOIN users AS b ON b.id=a.userid WHERE b.flag!='1' AND b.id!='1'";
		$results = mysqli_query($db, $query);
		$user = array();
		if (mysqli_num_rows($results) > 0) {
		    while($row = mysqli_fetch_assoc($results)) {
		        array_push($user, $row);
		    }
		}
		print_r( json_encode($user));
		exit();
	}else if($actionname == "changepassword"){
	    $currentpassword = MD5($_POST['currentpassword']);
	    $newpassword = MD5($_POST['newpassword']);
	    $userid = 0;
	    if (isset($_POST['actionnamedit']) && $_POST['actionnamedit'] == "adminchange"){
	    	$userid = $_POST['userid'];
	    }else {
	    	$userid = $_SESSION['user']['id'];
	    }
	    $query = "SELECT password FROM users WHERE id='$userid'";
	    $result = mysqli_query($db,$query);
	    $user = array();
	    if (mysqli_num_rows($result) > 0 ){
	        while($row = mysqli_fetch_assoc($result)){
	            array_push($user,$row);
	        }
	        if ($currentpassword == $user[0]["password"]){
	            $query = "UPDATE users SET password='$newpassword'  WHERE id='$userid'";
	            $result = mysqli_query($db,$query);
	            if ($result){
	                echo json_encode(array('info' => true));
	            }
	        }else{
	            echo json_encode(array('info' => false));   
	        }
	    }else{
	        echo json_encode(array('info' => false));
	    }
	}else if($actionname == "adminpasschange"){
	    $currentpass = MD5($_POST['currentpass']);
	    $newpass = MD5($_POST['newpass']);
	    $query = "SELECT password FROM users WHERE username='Admin'";
	    $result = mysqli_query($db,$query);
	    $user = array();
	    if (mysqli_num_rows($result) > 0 ){
	        while($row = mysqli_fetch_assoc($result)){
	            array_push($user,$row);
	        }
	        if ($currentpass == $user[0]["password"]){
	            $query = "UPDATE users SET password='$newpass'  WHERE username='Admin'";
	            $result = mysqli_query($db,$query);
	            if ($result){
	                echo json_encode(array('info' => true));
	            }
	        }else{
	            echo json_encode(array('info' => false));
	        }
	       }else{
	           echo json_encode(array('info' => false));
	       }
	 }else if($actionname == "adminemailchange"){
	    $currentem = $_POST['currentpass'];
	    $newem = $_POST['newem'];
	    $query = "SELECT email FROM users WHERE username='Admin'";
	    $result = mysqli_query($db,$query);
	    $user = array();
	    if (mysqli_num_rows($result) > 0 ){
	        while($row = mysqli_fetch_assoc($result)){
	            array_push($user,$row);
	        }
	        if ($currentem == $user[0]["email"]){
	            $query = "UPDATE users SET email='$newem'  WHERE username='Admin'";
	            $result = mysqli_query($db,$query);
	            if ($result){
	                echo json_encode(array('info' => true));
	            }
	        }else{
	            echo json_encode(array('info' => false));
	        }
	       }else{
	           echo json_encode(array('info' => false));
	       }
	 }else if($actionname == "deleteusernamedisplay"){
	     if (isset($_POST['usernamelist']) && $_POST['usernamelist'] == 'usernamelist'){
	         $query = "SELECT username,id FROM `users` WHERE id!='1' AND flag!='1' ORDER BY id";
	     }else {
	         $query = "SELECT username,id,flag FROM `users` WHERE id!='1' ORDER BY id";
	     }
	 	$result = mysqli_query($db,$query);
	 	$user = array();
	 	if (mysqli_num_rows($result) > 0){
	 		while ($row = mysqli_fetch_assoc($result)) {
	 			array_push($user, $row);
	 		}
	 		echo json_encode(array('info' => true,'usernamelist' => $user));
	 	}else {
	 		echo json_encode(array('info' => true));
	 	}
	 }else if ($actionname == "deleteusername"){
	 	$deleteuserid = $_POST['deleteuserid'];
	 	$flag = $_POST['flag'];
	 	$query = "UPDATE users SET flag='$flag'  WHERE id='$deleteuserid'";
	 	mysqli_query($db,$query);
	 	echo json_encode(array('info' => true));
	 }else if ($actionname == "displayallreport"){
	 	$query = "SELECT a.*,b.username as username FROM scandata as a LEFT JOIN users as b on b.id=a.userid";
	 	$result = mysqli_query($db,$query);
	 	$reportall = array();
	 	if ($result){
	 		if (mysqli_num_rows($result) > 0){
	 			while ($row = mysqli_fetch_assoc($result)) {
		 			array_push($reportall, $row);
		 		}
		 		echo json_encode(array('info'=>true,'reportalldata'=>$reportall));
	 		}else{
	 			echo json_encode(array('info'=>false));
	 		}
	 	}else{
	 		echo json_encode(array('info'=>false));
	 	}
	 }else if ($actionname == "displaybydatereport"){
	 	$query = "SELECT a.*,b.username as username FROM scandata as a LEFT JOIN users as b on b.id=a.userid ORDER BY scandate,scantime";
	 	$result = mysqli_query($db,$query);
	 	$reportall = array();
	 	if ($result){
	 		if (mysqli_num_rows($result) > 0){
	 			while ($row = mysqli_fetch_assoc($result)) {
		 			array_push($reportall, $row);
		 		}
		 		echo json_encode(array('info'=>true,'reportalldata'=>$reportall));
	 		}else{
	 			echo json_encode(array('info'=>false));
	 		}
	 	}else{
	 		echo json_encode(array('info'=>false));
	 	}
	 }else if ($actionname == "displaybyuserreport"){
	 	$query = "SELECT a.*,b.username as username FROM scandata as a LEFT JOIN users as b on b.id=a.userid ORDER BY a.userid";
	 	$result = mysqli_query($db,$query);
	 	$reportall = array();
	 	if ($result){
	 		if (mysqli_num_rows($result) > 0){
	 			while ($row = mysqli_fetch_assoc($result)) {
		 			array_push($reportall, $row);
		 		}
		 		echo json_encode(array('info'=>true,'reportalldata'=>$reportall));
	 		}else{
	 			echo json_encode(array('info'=>false));
	 		}
	 	}else{
	 		echo json_encode(array('info'=>false));
	 	}
	 }else if ($actionname == "displaybyuserdatereport"){
	 	$query = "SELECT a.*,b.username as username FROM scandata as a LEFT JOIN users as b on b.id=a.userid ORDER BY a.userid,a.scandate,a.scantime";
	 	$result = mysqli_query($db,$query);
	 	$reportall = array();
	 	if ($result){
	 		if (mysqli_num_rows($result) > 0){
	 			while ($row = mysqli_fetch_assoc($result)) {
		 			array_push($reportall, $row);
		 		}
		 		echo json_encode(array('info'=>true,'reportalldata'=>$reportall));
	 		}else{
	 			echo json_encode(array('info'=>false));
	 		}
	 	}else{
	 		echo json_encode(array('info'=>false));
	 	}
	 }else if ($actionname == "getemailaddress"){
	     $query = "SELECT eaddress1,eaddress2,eaddress3 FROM userprofile WHERE userid={$_SESSION['user']['id']}";
	     $result = mysqli_query($db,$query);
	     $eaddressarray = array();
	     if ($result){
	         if (mysqli_num_rows($result) > 0){
	             while($row=mysqli_fetch_assoc($result)){
	                 array_push($eaddressarray,$row);
	             }
	             echo json_encode(array('info' => true,'eaddresslist' => $eaddressarray));
	         }else{
	             echo json_encode(array('info' => false));
	         }
	     }else{
	         echo json_encode(array('info' => false));
	     }
	 }
?>