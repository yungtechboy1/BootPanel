<?php
	/**
	 * BootPanel looks for the class "Theme" to render the Control Panel
	 */
	class Theme {
		/**
		 * BootPanel will run the code inside login() in order to render the theme for non-logged in users
		 * You should but are not required to seperate your code into different methods to organize your code
		 */
		public static function login() {
			Theme::head();
			Theme::signin();
			Theme::foot();
		}
		
		/**
		 * BootPanel will run the code inside panel() in order to render the theme for logged in users
		 * You should but are not required to seperate your code into different methods to organize your code
		 */
		public static function panel() {
			Theme::head();
			Theme::body();
			Theme::foot();
		}
		
		/**
		 * This is used to create the header of BootPanel
		 * BootPanel finds this function using the panel() and login() methods
		 */
		public static function head() {
			Design::startHead();
				Design::setTitle("BootPanel");
				Design::loadCSSFromFile("default", "assets/bootstrap/css/bootstrap.css");
			Design::endHead();
		}
		
		/**
		 * This is used to create the login form of BootPanel
		 * BootPanel finds this function using the login() method
		 */
		public static function signin() {
			Design::startBody();
				Panel::startLayout();
					echo '<form class="form-signin" role="form">
							<center><h2 class="form-signin-heading">Please Sign-In</h2></center>
							<input type="username" class="form-control" placeholder="Username" required autofocus>
							<input type="password" class="form-control" placeholder="Password" required>
							</br>
							<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
						  </form>';
				Panel::endLayout();
			Design::endBody();
		}
		
		/**
		 * This is used to create the body of BootPanel
		 * BootPanel finds this function using the panel() method
		 */
		public static function body() {
			Design::startBody();
				Panel::startLayout();
					Panel::startPanel("warning", "File Manager", Glyphicon::openfolder());
						Panel::loadFileMgr();
						echo '<center>
								<a class="btn btn-lg btn-info">Create New File </a>
								<a class="btn btn-lg btn-danger">Delete Old File </a>
								<a class="btn btn-lg btn-success">Edit Files </a>
								<a class="btn btn-lg btn-primary">Upload/Download Files </a>
							  </center>';
					Panel::endPanel();
					Panel::startPanel("info", "Web Mail", Glyphicon::envelope());
						Panel::loadMailMgr();
						echo '<center>
								<a class="btn btn-lg btn-danger">Manage Webmail Accounts </a>
								<a class="btn btn-lg btn-success">Read Webmail </a>
								<a class="btn btn-lg btn-primary">Send Mass Email </a>
							  </center>';
					Panel::endPanel();
					Panel::startPanel("primary", "MySQL Database", Glyphicon::hdd());
						Panel::loadSQLMgr();
						echo '<center>
								<a class="btn btn-lg btn-success">Create New Database </a>
								<a class="btn btn-lg btn-info">Manage Databases </a>
								<a class="btn btn-lg btn-warning">Backup Database </a>
							  </center>';
					Panel::endPanel();
					Panel::startPanel("success", "BootPanel Account Management", Glyphicon::user());
						Panel::loadAccountMgr();
						echo '<center>
							  	<a class="btn btn-lg btn-primary">Add Users </a>
								<a class="btn btn-lg btn-danger">Remove Users </a>
							  </center>';
					Panel::endPanel();
					Panel::startPanel("default", "Domain Management", Glyphicon::globe());
						Panel::loadDomainMgr();
						echo '<center>
								<a align="left" class="btn btn-lg btn-success">Subdomains </a>  
							  	<a align="center" class="btn btn-lg btn-warning">Redirects </a>  
							  	<a align="right" class="btn btn-lg btn-danger">Banned IPs </a>
							  </center>';
					Panel::endPanel();
					Panel::startPanel("info", "Plugin Management", Glyphicon::flash());
						Panel::loadPluginMgr();
						echo '<center><a class="btn btn-lg btn-primary">Install New Plugin </a></center>';
					Panel::endPanel();
					Panel::startPanel("danger", "Statistics", Glyphicon::stats());
						Panel::loadStats();
						echo '<center><h3>' . Design::useGlyphicon(Glyphicon::hdd()) . '  <u>Hard Drive Usage</h3></u>';
						Design::addProgressBar("info", Disk::getHDD(), false);
						echo '</br><h3>' . Design::useGlyphicon(Glyphicon::cloud()) . '  <u>Bandwidth Usage</h3></u>';
						Design::addProgressBar("warning", Disk::getBandwidth(), true);
						echo '</br><h3>' . Design::useGlyphicon(Glyphicon::floppydisk()) . '  <u>MySQL Databases</h3></u>';
						Design::addProgressBar("success", Disk::getMySQL(), false);
						echo '</br><h3>' .Design::useGlyphicon(Glyphicon::envelope()) . '  <u>Webmail Accounts</h3></u></center>';
						Design::addProgressBar("warning", Disk::getWebmail(), false);
					Panel::endPanel();
				Panel::endLayout();
			Design::endBody();
		}
		
		/**
		 * This is used to create the footer of BootPanel
		 * BootPanel finds this function using the panel() and login() methods
		 */
		public static function foot() {
			Design::startFoot();
				Design::setTag("&copy; 2014 BootPanel");
				Design::loadJSFromURL("https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js");
				Design::loadJSFromFile("default", "assets/bootstrap/js/bootstrap.js");
			Design::endFoot();
		}
	}