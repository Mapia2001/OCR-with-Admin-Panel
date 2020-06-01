<!DOCTYPE html>
<html>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="../style/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="../style/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="./style/style.css">
	  <style type="text/css">
	  	div.pointer{
	  		cursor: pointer;
	  	}
	  </style>
<body>
	<div align="center" style="margin-top: 5%">
	    <div class="header" style=" width:40%;">
    		<h2>User Name</h2>
    	</div>
    	<div style="border:1px #eee solid;width:40%">
    	    <div class="row col-12">
    	    	<div class="col-6 text-left" style="text-align: center;" id="deleteusername">
    	    		
    	    	</div>
    	    	<div class="col-3 text-center" id="activatestatus">
    	    		
    	    	</div>
    	    	<div class="col-3 text-center pointer" id="deletebuttongroup">
    	    		
    	    	</div>
    	    </div>
    	</div>
	</div>
	<script>
	    var deleteuserlist = [];
		$(document).ready(function(){ 
		    loadusername();
		});

		function deletescreen(ddd) {
		    var deleteflag = 0;
		    var confirmstr = '';
	        for (var i = 0; i < deleteuserlist.length; i++){
	            if ( deleteuserlist[i]['userid'] == ddd ){
	                if ( deleteuserlist[i]['userflag'] == 0 ){
	                    confirmstr = 'Delete this user?';
	                    deleteflag = 1;
	                }else{
	                    confirmstr = 'Activate this user?';
	                    deleteflag = 0;
	                }
	            }
	        }
		    if ( confirm(confirmstr) == true){
    			$.ajax({
    				url: './view/profilefunction.php',
    				type: 'post',
    				datatype: 'json',
    				data: {actionname: 'deleteusername', deleteuserid: ddd, flag: deleteflag},
    				success: function(result){
    					result = JSON.parse(result);
    					if (result.info == true){
    						loadusername();
    					}
    				}
    			});
			} 
		}

		function loadusername() {
		    deleteuserlist = [];
			var deletebuttonstr = '';
		    var deleteusernamestr = '';
		    var activatestatusstr = '';
		    var deletebuttontext = '';
		    var acivatestatustext = '';
		    $.ajax({
		    	url: './view/profilefunction.php',
		    	type: 'post',
		    	datatype: 'json',
		    	data:{
		    		actionname: 'deleteusernamedisplay'
		    	},
	    	success: function(result){
	    		result = JSON.parse(result);
	    		if ( result.info == true ){
	    			for (var i = 0; i < result['usernamelist'].length; i++) {
	    			    if ( result['usernamelist'][i]['flag'] == 0 ){
	    			        deletebuttontext = 'Delete';
	    			        acivatestatustext = 'Activated';
	    			    }else{
	    			        deletebuttontext = 'Activate';
	    			        acivatestatustext = 'Deleted';
	    			    }
	    				deletebuttonstr += '<li style="list-style: none;background: #5F9EA0;color: white;margin-top: 3px;"  value="asdfdd" onclick="deletescreen('+result['usernamelist'][i]['id']+')">'+deletebuttontext+'</li>';
	    				deleteusernamestr += '<li style="list-style: none;margin-top: 3px;">'+result['usernamelist'][i]['username']+'</li>';
	    				activatestatusstr += '<li style="list-style: none;margin-top: 3px;background: #5F9EA0;color: white;margin-top: 3px;">'+acivatestatustext+'</li>';
	    				deleteuserlist.push({userid: result['usernamelist'][i]['id'],userflag: result['usernamelist'][i]['flag']});
	    			}
	    			$('#deleteusername').html(deleteusernamestr);
		    		$('#deletebuttongroup').html(deletebuttonstr);
		    		$('#activatestatus').html(activatestatusstr);
	    		} else{
                    alert('There is no member');
	    		}
	    	}
	    		
		    });
		}
	</script>
</body>
</html>