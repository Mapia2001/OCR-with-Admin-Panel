<!DOCTYPE html>
<html>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="../style/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	  <script src="../style/bootstrap.min.js"></script>
	  <link rel="stylesheet" type="text/css" href="./style/style.css">
	  <style>
	  		table {
	  			border: 1px #000 solid;
	  		}
	  		tr, th, td {
	  			border: 1px #000 solid;	
	  		}
	  </style>
<body>
	<div align="center" style="margin-top: 5%">
		<table id="t11" style="text-align: center">
			<thead style = "background: #5F9EA0;color: white;">
				<tr>
					<th>User Name</th>
				    <th>Ref No</th>
				    <th>Company Name</th> 
				    <th>Address</th>
				    <th>Tell No</th>
				    <th>Email Address1</th>
				    <th>Email Address2</th>
				    <th>Email Address3</th>
				    <th>Owners name and tell</th>
				    <th>Notes</th>
			  	</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
	</div>
	<script>
		$(document).ready(function(){
			$.ajax({
				url: "./view/profilefunction.php", 
				type: "post",
				dataType: "json",
				data: {
					'actionname': 'displayall',
				},
				success: function(result){
					var strtable = '';
					for(i=0; i<result.length; i++){
					    if (result[i].refno == null){
					        strtable += '<tr style="background: #f77b2e">';
    						strtable += '<td>' + result[i].username + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '<td>' + '' + '</td>';
    						strtable += '</tr>';
					    }else{
    						strtable += "<tr>";
    						strtable += "<td>" + result[i].username + "</td>";
    						strtable += "<td>" + result[i].refno + "</td>";
    						strtable += "<td>" + result[i].companyname + "</td>";
    						strtable += "<td>" + result[i].address + "</td>";
    						strtable += "<td>" + result[i].tellno + "</td>";
    						strtable += "<td>" + result[i].eaddress1 + "</td>";
    						strtable += "<td>" + result[i].eaddress2 + "</td>";
    						strtable += "<td>" + result[i].eaddress3 + "</td>";
    						strtable += "<td>" + result[i].ownernametell + "</td>";
    						strtable += "<td>" + result[i].notes + "</td>";
    						strtable += "</tr>";
					    }
					}
					$('tbody').html(strtable);
			  	}
		  	});
		});
	</script>
</body>
</html>