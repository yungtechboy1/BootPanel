<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="BootPanel">
		<link rel="icon" href="lib/theme/Default_Theme/assets/img/favicon.ico">

		<title>BootPanel | Login</title>
	
		<link href="lib/theme/Default_Theme/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="lib/theme/Default_Theme/assets/css/back.css" rel="stylesheet">

		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
			<div class="form-signin">
				<?php
					if(BootPanel::isDemoMode())
						echo '<center><p class="alert alert-warning">This is a DEMO version of BootPanel!</p></center>';
				?>
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> BootPanel Login</h3></div>
					<div class="panel-body">
						<?php
							BootPanel::getAPI()->designer()->getLoginForm();
						?>
					</div>
				</div>
				<?php
					if(BootPanel::getAPI()->auth()->isDefault())
						echo "<p class='alert alert-danger'>Default Username: <code>BootPanel</code><br>Default Password: <code>Admin</code></p>";
				?>
				<p class="text-muted" align="right">Version <?php echo BootPanel::VERSION; ?> | &copy; <a target="_blank" href="http://BootPanel.net">BootPanel</a></p>
			</div>
		</div>
	
		<script src="lib/theme/Default_Theme/assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>