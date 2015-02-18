<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="BootPanel">
		<link rel="icon" href="lib/theme/Default_Theme/assets/img/favicon.ico">
	
		<title>BootPanel | Panel</title>
	
		<link href="lib/theme/Default_Theme/assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="lib/theme/Default_Theme/assets/css/back.css" rel="stylesheet">
	
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
 						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">BootPanel</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="active"><a><?php echo BootPanel::getAPI()->getAuth()->getName(); ?></a></li>
						<li><a href="./?logout">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav><br>
	
		<div class="container">
			<?php
				if(!BootPanel::getAPI()->license()->isValid())
					echo '<center><p class="alert alert-warning form-signin">You are using an unpaid version of BootPanel</p></center>';
			?>
		
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-file"></span>
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								File Manager
							</a>
						</h4>
					</div>
					<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
						<div class="panel-body">
							
						</div>
					</div>
				</div>
				<div class="panel panel-warning">
					<div class="panel-heading" role="tab" id="headingTwo">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-cloud"></span>
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								MySQL Database Manager
							</a>
						</h4>
					</div>
					<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						<div class="panel-body">
							
						</div>
					</div>
				</div>
				<div class="panel panel-info">
					<div class="panel-heading" role="tab" id="headingThree">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-cog"></span>
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								BootPanel Configuration
							</a>
						</h4>
					</div>
					<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
						<div class="panel-body">
							
						</div>
					</div>
				</div>
			</div>
			
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-tasks"></span> Statistics</h3>
				</div>
				<div class="panel-body">
					
				</div>
			</div>
			
			<p class="text-muted" align="right">&copy; BootPanel</p>
		</div>

		<script src="lib/theme/Default_Theme/assets/js/jQuery.js"></script>
		<script src="lib/theme/Default_Theme/assets/js/bootstrap.min.js"></script>
		<script src="lib/theme/Default_Theme/assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>