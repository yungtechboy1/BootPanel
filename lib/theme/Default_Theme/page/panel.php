<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
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
		</nav>
	
		<div class="container">
			
		</div>

		<script src="lib/theme/Default_Theme/assets/js/jQuery.js"></script>
		<script src="lib/theme/Default_Theme/assets/js/bootstrap.min.js"></script>
		<script src="lib/theme/Default_Theme/assets/js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>