<?php include('../api/login/functions.php') ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Log In</title>
	
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="../style/bootstrap.min.css">
      <script src="../style/jquery-3.3.1.min.js"></script>
      <script src="../style/popper.min.js"></script>
      <script src="../style/bootstrap.min.js"></script>
      <link rel="stylesheet" href="../style/style_dash.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../style/style_font.css">
      <link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
    <div class="top-bar">
      	<div class="container">
	        <div class="row">
	          <div class="col-12">
	            <?php if (isset($_SESSION['user'])) :?>
		            <div class="float-right">
						<ul class="nav navbar-nav navbar-right">
						     <li class="dropdown">
						        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: white;text-decoration: none;">
						        	<strong><?php echo $_SESSION['user']['username']; ?></strong>
						        	<small><i>(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i></small>
						        	<span class="caret"></span>
						        </a>
						        <ul class="dropdown-menu">
						            <li><a href="../index.php?logout='1'" style="text-decoration: none;color: black;">Logout</a></li>
						        </ul>
						     </li>
						</ul>
		            </div>
	            <?php else :?>
		            <span class="mx-md-2 d-inline-block"></span>
	            <?php endif ?>
	          </div>
	        </div>
  		</div>
 	</div>
	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>
        <div class="input-group">
			<label>Email&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input type="email" name="email" >
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" style="padding: 10px;font-size: 15px;color: white;background: #5F9EA0;border: none;border-radius: 5px;" name="login_btn">Login</button>
		</div>
	</form>
</body>
</html>