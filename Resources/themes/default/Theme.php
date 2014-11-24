<?php
	class Theme {
		public static function onLoad($request) {
			Theme::loadHead();
			Design::registerAPI("api/Panel.php");
			if($request == "login")
				Theme::loadLogin();
			elseif($request == "panel")
				Theme::loadPanel();
			Theme::loadFoot();
		}
		
		public static function loadHead() {
			Design::startHead();
				Design::setIcon("assets/img/favicon.ico");
				Design::loadCSS("assets/bootstrap/css/bootstrap.min.css");
				Design::setAuthor("BootPanel Developers");
				Design::setDesc("BootPanel is a free, open source server control panel written in PHP.  You can download it at http://BootPanel.net");
				Design::setTitle("BootPanel");
			Design::endHead();
			echo '<div class="container"></br>';
		}
		
		public static function loadLogin() {
			echo '<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> BootPanel Login</h3>
					</div>
					<div class="panel-body">
						<form class="form-signin" role="form" method="post">
							<input class="form-control" type="password" name="password" id="password" placeholder="Password" required autofocus></br>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Sign In</button>
				  		</form>
					</div>
				  </div>';
		}
		
		public static function loadPanel() {
			Panel::nav();
			Panel::fileMgrPanel();
			Panel::mysqlPanel();
			Panel::webmailPanel();
			Panel::bootpanelMgr();
			Panel::statsPanel();
		}
		
		public static function loadFoot() {
			Design::setCopyright("&copy; 2014 BootPanel", "text-muted", "align=\"right\"");
			echo '</div>';
			Design::startFooter();
				Design::loadJS("assets/ajax/jquery.min.js");
				Design::loadJS("assets/bootstrap/js/bootstrap.min.js");
			Design::endFooter();
		}
	}