<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/bootstrap.min.css">
  <script src="./style/jquery-3.3.1.min.js"></script>
  <script src="./style/popper.min.js"></script>
  <script src="./style/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
	<div>
	    <div class="header">
		    <h2>Change Password</h2>
	    </div>
    	<form>
    		<div class="input-group">
    			<label>Current Password</label>
    			<input type="password" id="currentpass"/>
    		</div>
    		<div class="input-group">
    			<label>New Password&nbsp;&nbsp;&nbsp;</label>
    			<input type="password" id="newpass">
    		</div>
    		<div class="input-group">
    			<label>Confirm Password</label>
    			<input type="password" id="confirmpass">
    		</div>
    		<div class="input-group">
    			<button type="button" style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" onclick="changepass()">Save Change</button>
    		</div>
	</form>
	</div>
	<script>
	    function changepass(){
	        if ( $('#currentpass').val() == '' ){
	            alert('enter the current password');
	            return;
	        }
	        if ( $('#newpass').val() == '' ){
	            alert('enter new password');
	            return;
	        }
	        if ( $('#confirmpass').val() == '' ){
	            alert('enter confirm password');
	            return;
	        }
	        if ( $('#newpass').val() != $('#confirmpass').val() ){
	            alert('invalid confirm password');
	            return;
	        }
	        $.ajax({
				url: "./view/profilefunction.php", 
				type: "post",
				dataType: "json",
				data: {
					'actionname': 'adminpasschange','currentpass': $('#currentpass').val(),'newpass': $('#newpass').val(),'confirmpass': $('#confirmpass').val()
				},
				success: function(result){
					if (result.info == true){
					    alert('success');
					}else{
					    alert('invalid current password');
					}
			  	}
		  	});
	    }
	</script>
</body>
</html>