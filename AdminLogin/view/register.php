<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../style/bootstrap.min.css">
  <script src="./style/jquery-3.3.1.min.js"></script>
  <script src="./style/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./style/style_font.css">
  <link rel="stylesheet" type="text/css" href="./style/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<body>
	<div id="registerdlg">
	    <div class="header">
		    <h2>Register</h2>
	    </div>
    	<form>
    		<div class="input-group">
    			<label>Username</label>
    			<input type="text" id="username_re"/>
    		</div>
    		<div class="input-group">
    			<label>Email&nbsp;&nbsp;&nbsp;</label>
    			<input type="email" id="email_re">
    		</div>
    		<div class="input-group">
    			<label>Password</label>
    			<input type="password" id="password_1_re">
    		</div>
    		<div class="input-group">
    			<label>Confirm password</label>
    			<input type="password" id="password_2_re">
    		</div>
    		<div class="input-group">
    			<button type="button" style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" id="register_btn_re" onclick="register()">Register</button>
    		</div>
	    </form>
	</div>
	<script>
	    function register(){
	        if ( $('#username_re').val() == '' ){
	            alert ('enter username');
	            return;
	        }
	        
	        if ( $('#email_re').val() == '' ){
	            alert('enter email address');
	            return;
	        }
	        
	        if ( $('#password_1_re').val() == '' ){
	            alert('enter password');
	            return;
	        }
	        
	        if ( $('#password_1_re').val() != $('#password_2_re').val() ){
	            alert('invalid confirm password');
	            return;
	        }
	        
	        $.ajax({
				url: "./api/login/functions.php", 
				type: "post",
				dataType: "json",
				data: {
					'register_btn': 'register_btn','username': $('#username_re').val(),'email': $('#email_re').val(),'password_1': $('#password_1_re').val(), 'password_2': $('#password_2_re').val(),'flag': 0
				},
				success: function(result){
					if (result.info == false){
					    alert('register success');
					    $('#registerdlg').hide();
					}else{
					    alert('user already register')
					}
			  	}
		  	});
	    }
	</script>
</body>
</html>