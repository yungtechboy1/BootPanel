<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="BootPanel">
		<link rel="icon" href="lib/theme/default/assets/img/login.favicon.ico">
		
		<title>BootPanel | Login</title>
		
		<link href="lib/theme/default/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="lib/theme/default/assets/css/back.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<div class="container">
			<div class="form-signin">
				<?php
					if(isset($_POST['password']) && !empty($_POST['password']))
						echo '<div class="alert alert-danger fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<center><strong>Login Failed!</strong></center>
							  </div>';
				?>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> BootPanel Login</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<input class="form-control" type="password" id="password" name="password" placeholder="Password" required autofocus>
							<button class="btn btn-lg btn-block btn-info" type="submit">Login</button>
						</form>
					</div>
				</div>
				<?php
					if(BootPanel::getConfig()->get("Password") == BootPanel::secure("Admin"))
						echo '<center><p class="alert alert-danger"><strong>Default Password: <code>Admin</code></strong><br>(Change password to remove message)</p></center>';
				?>
			</div>
		</div>
		
		<script src="lib/theme/default/assets/js/jQuery.min.js"></script>
		<script src="lib/theme/default/assets/js/bootstrap.min.js"></script>
		<script src="lib/theme/default/assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>