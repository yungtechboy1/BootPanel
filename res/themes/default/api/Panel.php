<?php
	class Panel {
		public static function progressBar($percent, $type, $active = false) {
			if(!$active)
				return '<div class="progress">
							<div class="progress-bar progress-bar-'. $type .'"  role="progressbar" aria-valuenow="'. $percent .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $percent .'%">
								'. $percent .'%
							</div>
						</div>';
			else
				return '<div class="progress">
							<div class="progress-bar progress-bar-'. $type .' progress-bar-stripped active"  role="progressbar" aria-valuenow="'. $percent .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $percent .'%">
								'. $percent .'%
							</div>
						</div>';
		}
		
		public static function nav() {
			echo '<div class="navbar navbar-default navbar-fixed-top" role="navigation">
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
								<li><a href="./?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
							</ul>
						</div>
					</div>
				  </div></br></br>';
		}
		
		public static function fileMgrPanel() {
			echo '<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-file"></span> File Manager</h3>
					</div>
					<div class="panel-body">'.
						'<p class="alert alert-warning">This is under works</p>'
					.'</div>
				  </div>';
		}
		
		public static function mysqlPanel() {
			echo '<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-cloud"></span> MySQL Database Manager</h3>
					</div>
					<div class="panel-body">'.
						'<p class="alert alert-warning">This is under works</p>'
					.'</div>
				  </div>';
		}
		
		public static function webmailPanel() {
			echo '<div class="panel panel-warning">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-envelope"></span> Webmail</h3>
					</div>
					<div class="panel-body">'.
						'<p class="alert alert-warning">This is under works</p>'
					.'</div>
				  </div>';
		}
		
		public static function bootpanelMgr() {
			echo '<div class="panel panel-success">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> BootPanel Manager</h3>
					</div>
					<div class="panel-body">'.
						'<p class="alert alert-warning">This is under works</p>'
					.'</div>
				  </div>';
		}
		
		public static function statsPanel() {
			echo '<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-stats"></span> Statistics</h3>
					</div>
					<div class="panel-body">
						<h4><span class="glyphicon glyphicon-hdd"></span> <u>HDD Usage</u></h4>'.
						Panel::progressBar(Statistics::getHDD(), false).'
						<h4><span class="glyphicon glyphicon-transfer"></span> <u>Bandwidth Usage</u></h4>'.
						Panel::progressBar(Statistics::getBandwidth(), false).'
						<h4><span class="glyphicon glyphicon-cloud"></span> <u>MySQL Database Usage</u></h4>'.
						Panel::progressBar(Statistics::getMySQL(), false).'
						<h4><span class="glyphicon glyphicon-envelope"></span> <u>Webmail Account Usage</u></h4>'.
						Panel::progressBar(Statistics::getWebmail(), false)
					.'</div>
				  </div>';
		}
	}