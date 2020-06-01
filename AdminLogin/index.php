<?php
	include('./api/login/functions.php');
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
      <style>
          li.pointer {
            cursor: pointer;
          }
          
          
      </style>
</head>
<body>
	<div>
		<div id="menubar" class="top-bar">
	      	<div class="container">
		        <div class="row">
		          <div class="col-12">
		            <?php if (isset($_SESSION['user'])) :?>
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
    							         <a href="index.php?logout='1'" style="text-decoration: none;color: white;padding-left:10px;">Logout</a>
    							     </li>
    							</ul>
			                </div>
			            </div>
		            <?php else :?>
			            <span class="mx-md-2 d-inline-block"></span>
			            <div class="float-right">
				            <a href="./view/login.php" class="text-white"><span class="text-white fa fa-sign-in"></span> <span class="d-none d-md-inline-block">Log In</span></a>
			            </div>
		            <?php endif ?>
		          </div>
		        </div>
      		</div>
   	 	</div>
   	 	<div>
    	   <div>
       	 	    <?php if (isset($_SESSION['user'])) :?>
    			    <div class="row col-12">
    				    <?php if ($_SESSION['user']['username'] == 'Admin') : ?>
    					    <div  id="leftside" class="text-left float-left col-2" style="color: white; background: #5F9EA0; text-align: center; border: 1px solid #B0C4DE; border-bottom: none;padding: 20px;">
    					        <ul style="list-style: none">
    					            <li>USERS</li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="listalluser" class="col-9">LIST ALL</span></div></li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="username" class="col-9">USER NAME</span></div></li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="addnew" class="col-9">ADD NEW</span></div></li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="deleteuser" class="col-9">DELETE USER</span></div></li>
    					        </ul>
    					        <ul style="list-style: none">
    					            <li>REPORTS</li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="listallrepo" class="col-9">LIST ALL</span></div></li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="listbydate" class="col-9">LIST BY DATE</span></div></li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="listbyuser" class="col-9">LIST BY USER</span></div></li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="listbyuserdate" class="col-9">LIST BY USER AND DATE</span></div></li>
    					        </ul>
    					        <ul style="list-style: none">
    					            <li>ADMIN</li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="changepasswordadmin" class="col-9">CHANGE PASSWORD</span></div></li>
    					            <li class="pointer"><div class="row"><span class="col-3"></span><span id="changeemailadmin" class="col-9">CHANGE EMAIL</span></div></li>
    					        </ul>
    				        </div>
                   	 	    <div class="col-10" id="adminveiw"></div>
    				    <?php else:?>
        	                <div class="col-12">
        	                    <div class="header">
                                    <a href="./view/userprofile.php" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;text-decoration: none;"><h2>USER PROFILE</h2></a>
                                </div>
                        	    <div class ="header">
                        	        <li class="pointer" style="color: white;text-decoration: none;list-style:none"><h2><span id="sendemaildata" data-toggle="modal" data-target="#myModalreport">REPORTS</span></h2></li>
                        	    </div>
        	                </div>
    				    <?php endif ?>
    				</div>
    			<?php else :?>
    				<image src="./image/login.png" style="width: 100%;height:50%;"></image>
    			<?php endif ?>
       	 	</div>
   	 	</div>
	</div>
	<div class="modal hide fade" id="myModalreport" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">REPORT</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <label data-error="wrong" data-success="right" for="form3">Select Email Address</label>
                  <div id="dropdownlistemail"></div>
                </div>
                <div class="md-form mb-4">
                  <label data-error="wrong" data-success="right" for="form2">New Password</label>
                  <input type="password" id="reportdate" class="form-control validate">
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" id="sendreportdata">Send</button>
              </div>
            </div>
          </div>
    </div>
	<script>
	    var em1 = "";
	    var em2 = "";
	    var em3 = "";
	    $(document).ready(function(){
	        $.ajax({
	           url:"./view/profilefunction.php",
	           type: "post",
	           datatype: "json",
	           data: {'actionname': 'getemailaddress'},
	           success:function(result){
	               result = JSON.parse(result);
	               if ( result["info"] == true ){
	                   em1 = result["eaddresslist"][0]["eaddress1"];
	                   em2 = result["eaddresslist"][0]["eaddress2"];
	                   em3 = result["eaddresslist"][0]["eaddress3"];
	                   var str = '';
        	           str+= '<select id="cars" name="cars"><option value="' + em1 + '">' + em1 + '</option>';
                       str+= '<option value="' + em2 + '">' + em2 + '</option>';
                       str+= '<option value="' + em3 + '">' + em3 + '</option>';
                       str+='</select>';
            	       $('#dropdownlistemail').html(str); 
	               }else{
	                   
	               }
	           }
	        });
	    });
	    $('#leftside').height($(document).height() * 0.908);
	    $('#listalluser').click(function(){
	        $('#adminveiw').load('./view/userview.php');
	    });
	    $('#addnew').click(function(){
	        $('#adminveiw').load('./view/register.php');
	    });
	    $('#changepasswordadmin').click(function(){
	       $('#adminveiw').load('./view/changepassword.php'); 
	    });
	    $('#changeemailadmin').click(function(){
	       $('#adminveiw').load('./view/changeemail.php'); 
	    });
	    $('#username').click(function(){
	        $('#adminveiw').load('./view/username.php');
	    });
	    $('#deleteuser').click(function(){
	        $('#adminveiw').load('./view/deleteuser.php');
	    });
	    $('#listallrepo').click(function(){
	        $('#adminveiw').load('./view/reportsall.php');
	    });
	    $('#listbydate').click(function(){
	        $('#adminveiw').load('./view/listbydatereport.php');
	    });
	    $('#listbyuser').click(function(){
	        $('#adminveiw').load('./view/listbyuserreport.php');
	    });
	    $('#listbyuserdate').click(function(){
	        $('#adminveiw').load('./view/listbyuserdatereport.php');
	    });
	    $('#sendreportdata').click(function(){
	        $.ajax({
                url: "./reportdata/sendmail.php",
                type: "post",
                datatype: "json",
                data:{"sendaddress": $('#cars').val()},
                success: function(result){  
                    result = JSON.parse(result);
                    if ( result["info"] == true ){
                        alert("mail send...ok");
                    }else{
                        alert(result['message']);
                    }
                }
            });
	    });
	</script>
</body>
</html>