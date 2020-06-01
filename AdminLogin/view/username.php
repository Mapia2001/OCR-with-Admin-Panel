<!DOCTYPE html>
<html>
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
          div.pointer {
            cursor: pointer;
          }
          
          
      </style>
    </head>
    <body>
        <div align="center" class="container row col-12">
            <div class="col-4">
                <div class="header" style=" width:60%;">
                    <h2>User Name</h2>
                </div>
                <div style="border:1px #eee solid;width:60%">
                    <div id="usernamefield" class="pointer">
                        
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="header" style=" width:50%;">
            		<h2>User Profile</h2>
            	</div>
            	<div class="row" style="border:1px #eee solid; width:50%;">
            		  <div class="form-group form-inline row w-100">
                          <div class="col-4 text-left">User Name</div>
                          <div class="col-8 text-left">
                            <span id="user"></span>
                          </div>
                      </div>
                      <div class="form-group form-inline row w-100">
            		      <div class="col-4 text-left">Ref No</div>
            	  		  <div class="col-8 text-left">
            	      		<input type="text" class="form-control" id="refnoedit" placeholder="Enter RefNo" name="refno">
                  	      </div>
            		  </div>
            		  <div class="form-group form-inline row w-100">
            		      <div class="col-4 text-left">Company Name</div>
            		      <div class="col-8 text-left">
            		        <input type="text" class="form-control" id="companynameedit" placeholder="Enter Company Name" name="companyname">
            		      </div>
            	      </div>
            		  <div class="form-group form-inline row w-100">
            		  		 <div class="col-4 text-left">Address</div>
            		  		 <div class="col-8 text-left">
            	      		    <input type="text" class="form-control" id="addressedit" placeholder="Enter Address" name="address">
            		  		 </div>
            		  </div>
            		  <div class="form-group form-inline row w-100">
            		      <div class="col-4 text-left">
            		           Tell No
            		      </div>
            		      <div class="col-8 text-left">
            		          <input type="text" class="form-control col-12" id="tellnoedit" placeholder="Enter TellNo" name="tellno">
            		      </div>
            	      </div>
            		  <div class="form-group form-inline row w-100">
            		  		 <div class="col-4 text-left">Email Address1</div>
            		  		 <div class="col-8 text-left">
            	      		    <input type="email" class="form-control" id="eaddress1edit" placeholder="Enter EAddress1" name="eaddress1">
            		  		 </div>
            		  </div>
            		  <div class="form-group form-inline row w-100">
            		      <div class="col-4 text-left">Email Address2</div>
            		      <div class="col-8 text-left">
            		          <input type="email" class="form-control" id="eaddress2edit" placeholder="Enter EAddress2" name="eaddress2">
            		      </div>
            	      </div>
            		  <div class="form-group form-inline row w-100">
            		  		 <div class="col-4 text-left">Email Address3</div>
            	      		 <div class="col-8 text-left">
            	      		     <input type="email" class="form-control" id="eaddress3edit" placeholder="Enter EAddress3" name="eaddress3">
            	      		 </div>
            		  </div>
            		  <div class="form-group form-inline row w-100">
            		      <div class="col-4 text-left">Owner names and tell</div>
            		      <div class="col-4 text-left">
            		          <input type="text" class="form-control" id="ownernametelledit" placeholder="Enter Ownernametell" name="ownernametell">
            		      </div>
            	      </div>
            		  <div class="form-group col-12">
            		      <label for="notes">Notes</label>
            		      <textarea type="text" class="form-control" id="notesedit" placeholder="Enter Notes" name="notes"></textarea>
            	      </div>
            		    <div class="input-group text-right">
            			    <button style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" onclick="savefunc();" name="saveedit">Save</button><span>&nbsp;&nbsp;</span>
            			    </button><span>&nbsp;&nbsp;</span><button id="yhyhyh" style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" name="changeedit"data-toggle="modal" data-target="#myModaledit">Change Password</button>
            		    </div>
            	</div>
            </div>
	    </div>
        <div class="modal hide fade" id="myModaledit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
                  <input type="password" id="currentpasswordedit" class="form-control validate">
                </div>
                <div class="md-form mb-4">
                  <label data-error="wrong" data-success="right" for="form2">New Password</label>
                  <input type="password" id="newpasswordedit" class="form-control validate">
                </div>
                <div class="md-form mb-4">
                  <label data-error="wrong" data-success="right" for="form2">Confrim Password</label>
                  <input type="password" id="confirmpasswordedit" class="form-control validate">
                </div>
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" name="savechangeedit" onclick="changepasswordedit()">Save change</button>
              </div>
            </div>
          </div>
        </div>
    	<script>
            var userlist = [];
            var useridsave = 0;
            $(document).ready(function(){ 
                userlist = [];
                var deletebuttonstr = '';
                var usernameele = {};
                $.ajax({
                    url: './view/profilefunction.php',
                    type: 'post',
                    datatype: 'json',
                    data:{
                        actionname: 'deleteusernamedisplay',usernamelist: 'usernamelist'
                    },
                success: function(result){
                        result = JSON.parse(result);
                        if ( result.info == true ){
                            for (var i = 0; i < result['usernamelist'].length; i++) {
                                deletebuttonstr += '<li style="list-style: none;" onclick="userprofiledisplay('+result['usernamelist'][i]['id']+')">'+result['usernamelist'][i]['username']+'</li>';
                                usernameele = {username: result['usernamelist'][i]['username'], userid: result['usernamelist'][i]['id']};
                                userlist.push(usernameele);
                            }
                            $('#usernamefield').html(deletebuttonstr);
                        } else{
                            alert('There is no user');
                        }
                    }
                });
            });

            function userprofiledisplay(disid) {
                var username1 = '';
                useridsave = disid;
                for (var i = 0; i <= userlist.length; i++) {
                    if (userlist[i].userid == disid){
                        username1 = userlist[i].username;
                        break;
                    }
                }
                $('#user').text(username1);
                $.ajax({
                url: "./view/profilefunction.php", 
                type: "post",
                dataType: "json",
                data: {
                    'actionname': 'displaydata',
                    'actionnamedis': 'usernameprofile',
                    'disuserid': disid
                },
                success: function(result){
                    if(result.info == true){
                        $('#refnoedit').val(result.refno);
                        $('#companynameedit').val(result.companyname);
                        $('#addressedit').val(result.address);
                        $('#tellnoedit').val(result.tellno);
                        $('#eaddress1edit').val(result.eaddress1);
                        $('#eaddress2edit').val(result.eaddress2);
                        $('#eaddress3edit').val(result.eaddress3);
                        $('#ownernametelledit').val(result.ownernametell);
                        $('#notesedit').val(result.notes);
                    }else{
                        alert('You have to make profile');
                        $('#refnoedit').val('');
                        $('#companynameedit').val('');
                        $('#addressedit').val('');
                        $('#tellnoedit').val('');
                        $('#eaddress1edit').val('');
                        $('#eaddress2edit').val('');
                        $('#eaddress3edit').val('');
                        $('#ownernametelledit').val('');
                        $('#notesedit').val('');
                    }
                }
            });
            }

    		function savefunc(){
    		    if ( $('#refnoedit').val() == '' ){
    		        alert('enter ref no');
    		        return;
    		    }
    		    if ( $('#companynameedit').val() == '' ){
    		        alert('enter companyname');
    		        return;
    		    }
    		    if ( $('#addressedit').val() == '' ){
    		        alert('address');
    		        return;
    		    }
    		    if ( $('#tellnoedit').val() == '' ){
    		        alert('enter tellno');
    		        return;
    		    }
    		    if ( $('#eaddress1edit').val() == '' ){
    		        alert('enter eaddress1');
    		        return;
    		    }
    		    if ( $('#eaddress2edit').val() == '' ){
    		        alert('enter eaddress2');
    		        return;
    		    }
    		    if ( $('#eaddress3edit').val() == '' ){
    		        alert('enter eaddress3');
    		        return;
    		    }
    		    if ( $('#ownernametelledit').val() == '' ){
    		        alert('enter ownernametell');
    		        return;
    		    }
    		    if ( $('#notesedit').val() == '' ){
    		        alert('enter notes');
    		        return;
    		    }
    			$.ajax({
    				url: "./view/profilefunction.php", 
    				type: "post",
    				dataType: "json",
    				data: {
    					'actionname': 'savedata',
                        'actionnamedis': 'adminedit',
                        'userid': useridsave,
    					'refno' : $('#refnoedit').val(),
    					'companyname'   : $('#companynameedit').val(),
    					'address'  : $('#addressedit').val(),
    					'tellno'  : $('#tellnoedit').val(),
    					'eaddress1'  : $('#eaddress1edit').val(),
    					'eaddress2'  : $('#eaddress2edit').val(),
    					'eaddress3' : $('#eaddress3edit').val(),
    					'ownernametell' : $('#ownernametelledit').val(),
    					'notes' : $('#notesedit').val(),
    				},
    				success: function(result){
    			    	if (result.info == true){
                            alert('success save');
                        }
    			  	}});
    		}
            
            function changepasswordedit(){
                var result1 = {};
                if ( useridsave == 0 ){
                    alert('select user');
                    $('#yhyhyh').click();
                    return;
                }
                if ($('#currentpasswordedit').val() == ''){
                    alert('please enter currentpassword');
                    return;
                }
                if ($('#newpasswordedit').val() == ''){
                    alert('please enter new password');
                    return;
                }
                if ($('#confirmpasswordedit').val() == ''){
                    alert('please reenter new password');
                    return;
                }
                if ($('#newpasswordedit').val() != $('#confirmpasswordedit').val()){
                    alert('invalid confirm password');
                    return;
                }
                $.ajax({
                    url: "./view/profilefunction.php",
                    type: "post",
                    datatype: "json",
                    data:{
                        'actionname':'changepassword',
                        'actionnamedit': 'adminchange',
                        'userid': useridsave,
                        'currentpassword': $('#currentpasswordedit').val(),
                        'newpassword': $('#newpasswordedit').val(),
                        'confirmpassword': $('#confirmpasswordedit').val()
                    },
                    success: function(result){
                        if (JSON.parse(result).info == true){
                            alert('success');
                            $('#yhyhyh').click();
                        }else{
                            alert('invalid current password');
                        }
                    }
                });
            }
    	</script>
    </body>
</html>