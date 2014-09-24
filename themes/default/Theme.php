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
						Design::startCenter();
							Panel::createButton("info", "createFile", "Create New File");
							Panel::createButton("danger", "deleteFile", "Delete Files");
							Panel::createButton("success", "editFiles", "Edit Files");
							Panel::createButton("primary", "uploadDownloadFiles", "Upload/Download Files");
						Design::endCenter();
						Panel::loadFileMgr();
					Panel::endPanel();
					Panel::startPanel("info", "Web Mail", Glyphicon::envelope());
						Design::startCenter();
							Panel::createButton("danger", "manageWebmail", "Manage Webmail Accounts");
							Panel::createButton("success", "readWebmail", "Read Webmail");
							Panel::createButton("primary", "sendMassEmail", "Send Mass Email");
						Design::endCenter();
						Panel::loadMailMgr();
					Panel::endPanel();
					Panel::startPanel("primary", "MySQL Database", Glyphicon::cloud());
						Design::startCenter();
							Panel::createButton("success", "newDatabase", "Create New Database");
							Panel::createButton("info", "manageDatabases", "Manage Databases");
							Panel::createButton("warning", "backupDatabase", "Backup Database");
						Design::endCenter();
						Panel::loadSQLMgr();
					Panel::endPanel();
					Panel::startPanel("success", "BootPanel Account Management", Glyphicon::user());
						Design::startCenter();
							Panel::createButton("primary", "addUsers", "Add Users");
							Panel::createButton("danger", "removeUsers", "Remove Users");
						Design::endCenter();
						Panel::loadAccountMgr();
					Panel::endPanel();
					Panel::startPanel("default", "Domain Management", Glyphicon::globe());
						Design::startCenter();
							Panel::createButton("success", "subdomains", "Subdomains");
							Panel::createButton("warning", "redirects", "Redirects");
							Panel::createButton("danger", "bannedips", "Banned IPs");
						Design::endCenter();
						Panel::loadDomainMgr();
					Panel::endPanel();
					Panel::startPanel("info", "Plugin Management", Glyphicon::flash());
						Design::startCenter();
							Panel::createButton("primary", "installPlugin", "Install New Plugin");
							Panel::createButton("danger", "removePlugin", "Remove A Plugin");
						Design::endCenter();
						Panel::loadPluginMgr();
					Panel::endPanel();
					Panel::startPanel("danger", "Statistics", Glyphicon::stats());
						Panel::loadStats();
						echo '<center><h3>' . Design::useGlyphicon(Glyphicon::hdd()) . '  <u>Hard Drive Usage</h3></u>';
							Design::addProgressBar("info", Stats::getHDD(), false);
						echo '</br><h3>' . Design::useGlyphicon(Glyphicon::transfer()) . '  <u>Bandwidth Usage</h3></u>';
							Design::addProgressBar("warning", Stats::getBandwidth(), true);
						echo '</br><h3>' . Design::useGlyphicon(Glyphicon::cloud()) . '  <u>MySQL Databases</h3></u>';
							Design::addProgressBar("success", Stats::getMySQL(), false);
						echo '</br><h3>' .Design::useGlyphicon(Glyphicon::envelope()) . '  <u>Webmail Accounts</h3></u></center>';
							Design::addProgressBar("warning", Stats::getWebmail(), false);
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