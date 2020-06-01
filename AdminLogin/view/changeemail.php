<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
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
		    <h2>Change Email</h2>
	    </div>
    	<form>
    		<div class="input-group">
    			<label>Current Email</label>
    			<input type="text" id="currentem"/>
    		</div>
    		<div class="input-group">
    			<label>New Email&nbsp;&nbsp;&nbsp;</label>
    			<input type="text" id="newem">
    		</div>
    		<div class="input-group">
    			<label>Confirm Email</label>
    			<input type="text" id="confirmem">
    		</div>
    		<div class="input-group">
    			<button type="button" style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" onclick="changeemail()">Save Change</button>
    		</div>
	</form>
	</div>
	<script>
	    function changeemail(){
	        if ( $('#currentem').val() == '' ){
	            alert('enter the current email address.');
	            return;
	        }
	        if ( $('#newem').val() == '' ){
	            alert('enter new email address.');
	            return;
	        }
	        if ( $('#confirmem').val() == '' ){
	            alert('enter confirm eamil address');
	            return;
	        }
	        if ( $('#newem').val() != $('#confirmem').val() ){
	            alert('invalid confirm eamil');
	            return;
	        }
	        $.ajax({
				url: "./view/profilefunction.php", 
				type: "post",
				dataType: "json",
				data: {
					'actionname': 'adminemailchange','currentem': $('#currentem').val(),'newem': $('#newem').val(),'confirmem': $('#confirmem').val()
				},
				success: function(result){
					if (result.info == true){
					    alert('success');
					}else{
					    alert('invalid current email address');
					}
			  	}
		  	});
	    }
	</script>
</body>
</html>