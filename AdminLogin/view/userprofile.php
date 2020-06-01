<?php
	include('../api/login/functions.php');
?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>User Profile</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../style/style_font.css">
  <link rel="stylesheet" type="text/css" href="../style/style.css">
  <link rel="stylesheet" href="../style/style_dash.css">
  <link rel="stylesheet" href="../style/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="../style/bootstrap.min.js"></script>
</head>
<body>
    <div class="top-bar">
	      	<div class="container">
		        <div class="row">
		          <div class="col-12">
			            <div class="float-right row">
			                <div>
    							<ul class="nav navbar-expand-sm navbar-right">
    							     <li class="nan-item">
    							        <a href="#" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;text-decoration: none;">
    							        	<strong><?php echo $_SESSION['user']['username']; ?></strong>
    							        	<small><i>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></small>
    							        </a>
    							     </li>
    							     <li class="nan-item">
    							         <a href="../index.php?logout='1'" style="text-decoration: none;color: white;padding-left:10px;">Logout</a>
    							     </li>
    							</ul>
			                </div>
			            </div>
		          </div>
		        </div>
      		</div>
   	 	</div>
    <div align="center" class="container">
    	<div class="header" style=" width:50%;">
    		<h2>User Profile</h2>
    	</div>
    	<div class="row" style="border:1px #eee solid; width:50%;">
    		  <div class="form-group form-inline row w-100">
    		      <div class="col-4 text-left">Ref No</div>
    	  		  <div class="col-8 text-left">
    	      		<input type="text" class="form-control" id="refno" placeholder="Enter RefNo" name="refno">
          	      </div>
    		  </div>
    		  <div class="form-group form-inline row w-100">
    		      <div class="col-4 text-left">Company Name</div>
    		      <div class="col-8 text-left">
    		        <input type="text" class="form-control" id="companyname" placeholder="Enter Company Name" name="companyname">
    		      </div>
    	      </div>
    		  <div class="form-group form-inline row w-100">
    		  		 <div class="col-4 text-left">Address</div>
    		  		 <div class="col-8 text-left">
    	      		    <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address">
    		  		 </div>
    		  </div>
    		  <div class="form-group form-inline row w-100">
    		      <div class="col-4 text-left">
    		           Tell No
    		      </div>
    		      <div class="col-8 text-left">
    		          <input type="text" class="form-control col-12" id="tellno" placeholder="Enter TellNo" name="tellno">
    		      </div>
    	      </div>
    		  <div class="form-group form-inline row w-100">
    		  		 <div class="col-4 text-left">Email Address1</div>
    		  		 <div class="col-8 text-left">
    	      		    <input type="email" class="form-control" id="eaddress1" placeholder="Enter EAddress1" name="eaddress1">
    		  		 </div>
    		  </div>
    		  <div class="form-group form-inline row w-100">
    		      <div class="col-4 text-left">Email Address2</div>
    		      <div class="col-8 text-left">
    		          <input type="email" class="form-control" id="eaddress2" placeholder="Enter EAddress2" name="eaddress2">
    		      </div>
    	      </div>
    		  <div class="form-group form-inline row w-100">
    		  		 <div class="col-4 text-left">Email Address3</div>
    	      		 <div class="col-8 text-left">
    	      		     <input type="email" class="form-control" id="eaddress3" placeholder="Enter EAddress3" name="eaddress3">
    	      		 </div>
    		  </div>
    		  <div class="form-group form-inline row w-100">
    		      <div class="col-4 text-left">Owner names and tell</div>
    		      <div class="col-4 text-left">
    		          <input type="text" class="form-control" id="ownernametell" placeholder="Enter Ownernametell" name="ownernametell">
    		      </div>
    	      </div>
    		  <div class="form-group col-12">
    		      <label for="notes">Notes</label>
    		      <textarea type="text" class="form-control" id="notes" placeholder="Enter Notes" name="notes"></textarea>
    	      </div>
    		    <div class="input-group text-right">
    			    <a href="../index.php"><button style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" onclick="savefunc();" name="save">Save</button></a><span>&nbsp;&nbsp;</span>
    			    </button><span>&nbsp;&nbsp;</span><button style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" name="change"data-toggle="modal" data-target="#myModal">Change Password</button>
    		    </div>
    	</div>
	</div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Change Password</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-5">
              <label data-error="wrong" data-success="right" for="form3">Current Password</label>
              <input type="password" id="currentpassword" class="form-control validate">
            </div>
            <div class="md-form mb-4">
              <label data-error="wrong" data-success="right" for="form2">New Password</label>
              <input type="password" id="newpassword" class="form-control validate">
            </div>
            <div class="md-form mb-4">
              <label data-error="wrong" data-success="right" for="form2">Confrim Password</label>
              <input type="password" id="confirmpassword" class="form-control validate">
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" name="savechange" onclick="changepassword()">Save change</button>
          </div>
        </div>
      </div>
    </div>
	<script>
		function savefunc(){
		    if ( $('#refno').val() == '' ){
		        alert('enter ref no');
		        return;
		    }
		    if ( $('#companyname').val() == '' ){
		        alert('enter companyname');
		        return;
		    }
		    if ( $('#address').val() == '' ){
		        alert('address');
		        return;
		    }
		    if ( $('#tellno').val() == '' ){
		        alert('enter tellno');
		        return;
		    }
		    if ( $('#eaddress1').val() == '' ){
		        alert('enter eaddress1');
		        return;
		    }
		    if ( $('#eaddress2').val() == '' ){
		        alert('enter eaddress2');
		        return;
		    }
		    if ( $('#eaddress3').val() == '' ){
		        alert('enter eaddress3');
		        return;
		    }
		    if ( $('#ownernametell').val() == '' ){
		        alert('enter ownernametell');
		        return;
		    }
		    if ( $('#notes').val() == '' ){
		        alert('enter notes');
		        return;
		    }
			$.ajax({
				url: "./profilefunction.php", 
				type: "post",
				dataType: "json",
				data: {
					'actionname': 'savedata',
					'refno' : $('#refno').val(),
					'companyname'   : $('#companyname').val(),
					'address'  : $('#address').val(),
					'tellno'  : $('#tellno').val(),
					'eaddress1'  : $('#eaddress1').val(),
					'eaddress2'  : $('#eaddress2').val(),
					'eaddress3' : $('#eaddress3').val(),
					'ownernametell' : $('#ownernametell').val(),
					'notes' : $('#notes').val(),
				},
				success: function(result){
			    	alert('success');
			  	}});
		}
        
        function changepassword(){
            if ($('#currentpassword').val() == ''){
                alert('please enter currentpassword');
                return;
            }
            if ($('#newpassword').val() == ''){
                alert('please enter new password');
                return;
            }
            if ($('#confirmpassword').val() == ''){
                alert('please reenter new password');
                return;
            }
            if ($('#newpassword').val() != $('#confirmpassword').val()){
                alert('invalid confirm password');
                return;
            }
            $.ajax({
                url: "./profilefunction.php",
                type: "post",
                datatype: "json",
                data:{
                    'actionname':'changepassword',
                    'currentpassword': $('#currentpassword').val(),
                    'newpassword': $('#newpassword').val(),
                    'confirmpassword': $('#confirmpassword').val()
                },
                success: function(result){
                    result = JSON.parse(result);
                    if (result.info == true){
                        alert('success');
                        $('#myModal').modal('hide');
                    }else{
                        alert('invalid current password');
                    }
                }
            });
        }
		$(document).ready(function(){
		    
			$.ajax({
				url: "./profilefunction.php", 
				type: "post",
				dataType: "json",
				data: {
					'actionname': 'displaydata',
				},
				success: function(result){
			    	if(result.info == true){
			    		$('#refno').val(result.refno);
			    		$('#companyname').val(result.companyname);
			    		$('#address').val(result.address);
			    		$('#tellno').val(result.tellno);
			    		$('#eaddress1').val(result.eaddress1);
			    		$('#eaddress2').val(result.eaddress2);
			    		$('#eaddress3').val(result.eaddress3);
			    		$('#ownernametell').val(result.ownernametell);
			    		$('#notes').val(result.notes);
			    	}else{
			    		alert('You have to make profile');
			    	}
			  	}
		  	});
		});
	</script>
</body>
</html>