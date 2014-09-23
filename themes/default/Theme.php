<?php
	/**
	 * BootPanel looks for the class "Theme" to render the Control Panel
	 */
	class Theme {
		/**
		 * BootPanel will run the code inside create() in order to render the theme
		 * You should but are not required to seperate your code into different methods to organize your code
		 */
		public static function create() {
			Theme::head();
			Theme::body();
			Theme::foot();
		}
		
		/**
		 * This is used to create the header of BootPanel
		 * BootPanel finds this function using the create() method
		 */
		public static function head() {
			Design::startHead();
				Design::setTitle("BootPanel");
				Design::loadCSSFromFile("default", "assets/bootstrap/css/bootstrap.css");
			Design::endHead();
		}
		
		/**
		 * This is used to create the body of BootPanel
		 * BootPanel finds this function using the create() method
		 */
		public static function body() {
			Design::startBody();
				Panel::startLayout();
					Panel::startPanel("warning", "File Manager");
						Panel::loadFileMgr();
					Panel::endPanel();
					Panel::startPanel("info", "Web Mail");
						Panel::loadMailMgr();
					Panel::endPanel();
					Panel::startPanel("primary", "MySQL Database");
						Panel::loadSQLMgr();
					Panel::endPanel();
					Panel::startPanel("danger", "Statistics");
						Panel::loadStats();
					Panel::endPanel();
					Panel::startPanel("success", "BootPanel Account Management");
						Panel::loadAccountMgr();
					Panel::endPanel();
					Panel::startPanel("default", "Domain Management");
						Panel::loadDomainMgr();
					Panel::endPanel();
					Panel::startPanel("info", "Plugin Management");
						Panel::loadPluginMgr();
					Panel::endPanel();
				Panel::endLayout();
			Design::endBody();
		}
		
		/**
		 * This is used to create the footer of BootPanel
		 * BootPanel finds this function using the create() method
		 */
		public static function foot() {
			Design::startFoot();
				Design::setTag("&copy; 2014 BootPanel");
				Design::loadJSFromURL("https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js");
				Design::loadJSFromFile("default", "assets/bootstrap/js/bootstrap.js");
			Design::endFoot();
		}
	}