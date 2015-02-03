<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="BootPanel">
		<link rel="icon" href="lib/theme/default/assets/img/login.favicon.ico">
		
		<title>BootPanel | Panel</title>
		
		<link href="lib/theme/default/assets/css/bootstrap.min.css" rel="stylesheet">
		
		<link href="lib/theme/default/assets/css/back.css" rel="stylesheet">
		
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	
	<body>
		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">BootPanel</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a data-toggle="modal" data-target="#logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</div><br>
		
		<div class="container">
			<div class="panel-group" id="accordion">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#fileMgr">
								<span class="glyphicon glyphicon-file"></span> File Manager
							</a>
						</h4>
					</div>
					<div id="fileMgr" class="panel-collapse collapse">
						<div class="panel-body">
							
						</div>
					</div>
				</div>
				
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#sqlMgr">
								<span class="glyphicon glyphicon-floppy-disk"></span> MySQL Management
							</a>
						</h4>
					</div>
					<div id="sqlMgr" class="panel-collapse collapse">
						<div class="panel-body">
							
						</div>
					</div>
				</div>
				
				<div class="panel panel-info">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#bootpanelConf">
								<span class="glyphicon glyphicon-cog"></span> BootPanel Configuration
							</a>
						</h4>
					</div>
					<div id="bootpanelConf" class="panel-collapse collapse">
						<div class="panel-body">
							
						</div>
					</div>
				</div>
				
			</div>
			
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title"><span class="glyphicon glyphicon-cloud"></span> Statistics</h3>
				</div>
				<div class="panel-body">
					
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="logoutLabel">Logout?</h4>
					</div>
					<div class="modal-body">
						<center><p>Are you sure you would like to logout?</p></center>
					</div>
					<div class="modal-footer">
						<center>
							<a type="button" class="btn btn-success" href="./?logout">Yes</a>
							<a type="button" class="btn btn-danger" data-dismiss="modal">No</a>
						</center>
					</div>
				</div>
			</div>
		</div>
		
		<script src="lib/theme/default/assets/js/jQuery.min.js"></script>
		<script src="lib/theme/default/assets/js/bootstrap.min.js"></script>
		<script src="lib/theme/default/assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>