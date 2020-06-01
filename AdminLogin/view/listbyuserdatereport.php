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
		<table id="t04" style="text-align: center">
			<thead style = "background: #5F9EA0;color: white;">
				<tr>
					<th>User Name</th>
				    <th>Company Name</th> 
				    <th>Reg No</th>
				    <th>Trailer</th>
				    <th>Container No</th>
				    <th>Iso</th>
				    <th>Seal no</th>
				    <th>load</th>
				    <th>Date</th>
				    <th>time</th>
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
					'actionname': 'displaybyuserdatereport',
				},
				success: function(result){
					if ( result.info == true ){
						var strtable = '';
						for(i=0; i<(result.reportalldata).length; i++){
						        strtable += '<tr>';
	    						strtable += '<td>' + (result.reportalldata)[i].username + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].companyname + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].regno + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].trailerno + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].containerno + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].isocode + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].sealno + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].loadstatus + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].scandate + '</td>';
	    						strtable += '<td>' + (result.reportalldata)[i].scantime + '</td>';
	    						strtable += '</tr>';
						}
						$('tbody').html(strtable);
					}else{
						alert('There is no scan result');
					}
			  	}
		  	});
		});
	</script>
</body>
</html>