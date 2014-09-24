<?php
	class Panel {
		/**
		 * Creates a page "container"
		 * Must be closed with endLayout()
		 */
		public static function startLayout() {
			echo '<div class="container">
					</br>';
		}
		
		/**
		 * Includes $file from $theme directory
		 * 
		 * @param Theme $theme
		 * @param File $file
		 */
		public static function includeFromFile($theme, $file) {
			require 'themes/' . $theme . '/' . $file;
		}
		
		/**
		 * Includes a theme from $url
		 * 
		 * @param URL $url
		 */
		public static function includeFromURL($url) {
			require $url;
		}
		
		/**
		 * Adds an Alert to the page
		 * 
		 * @param Type $type
		 * @param Content $text
		 */
		public static function addAlert($type, $text) {
			if(strtolower($type) == "default" || strtolower($type) == "primary" || strtolower($type) == "info" || strtolower($type) == "success" || strtolower($type) == "warning" || strtolower($type) == "danger"){
				echo '<center><p class="alert alert-' . $type . '">' . $text . '</p></center>';
			} else {
				echo '<center><h1 class="alert alert-danger">Unable to load due to sytnax error!</h1></center>';
			}
		}
		
		/**
		 * Starts a panel section
		 * 
		 * @param Type $type
		 * @param Name $name
		 * @param Glyphicon $glyphicon (optional)
		 */
		public static function startPanel($type, $name, $glyphicon = null) {
			if(!$glyphicon == null) {
				if(strtolower($type) == "default" || strtolower($type) == "primary" || strtolower($type) == "success" || strtolower($type) == "info" || strtolower($type) == "warning" || strtolower($type) == "danger") {
					echo '<div class="panel panel-' . $type . '">
							<div class="panel-heading">
								<div class="panel-title"><h3><span class="' . $glyphicon . '"></span>  ' . $name . '</h3></div>
							</div>
						  <div class="panel-body">';
				} else {
					echo '<center><p class="alert alert-danger">Unable to load due to sytnax error!</p></center>';
				}
			} else {
				if(strtolower($type) == "default" || strtolower($type) == "primary" || strtolower($type) == "success" || strtolower($type) == "info" || strtolower($type) == "warning" || strtolower($type) == "danger") {
					echo '<div class="panel panel-' . $type . '">
							<div class="panel-heading">
								<div class="panel-title"><h3>' . $name . '</h3></div>
							</div>
						  <div class="panel-body">';
				} else {
					echo '<center><p class="alert alert-danger">Unable to load due to sytnax error!</p></center>';
				}
			}
		}
		
		/**
		 * Ends a panel
		 */
		public static function endPanel() {
			echo '	</div>
				  </div>
				  </br>';
		}
		
		public static function createButton($type, $modal, $text, $center = false) {
			if(strtolower($type) == "default" || strtolower($type) == "primary" || strtolower($type) == "success" || strtolower($type) == "info" || strtolower($type) == "warning" || strtolower($type) == "danger") {
				echo '  <a class="btn btn-' . $type . ' btn-lg" data-toggle="modal" data-target="#' . $modal . '">' . $text . '</a>  ';
			} else {
				echo '<center><p class="alert alert-danger">Unable to load due to sytnax error!</p></center>';
			}
		}
		
		public static function startModal($label, $title) {
			echo '<div class="modal fade" id="' . $label . '" tabindex="-1" role="dialog" aria-labelledby="' . $label . 'Label" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
								<h4 class="modal-title" id="' . $label . 'Label">' . $title . '</h4>
							</div>
							<div class="modal-body">';
		}
		
		public static function endModal() {
			echo '			</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>';
		}
		
		/**
		 * Loads the File manager options
		 */
		public static function loadFileMgr() {
			Panel::startModal("createFile", "File Management");
				echo '...';
			Panel::endModal();
			Panel::startModal("deleteFile", "File Management");
				echo '...';
			Panel::endModal();
			Panel::startModal("editFiles", "File Management");
				echo '...';
			Panel::endModal();
			Panel::startModal("uploadDownloadFiles", "File Management");
				echo '...';
			Panel::endModal();
		}
		
		/**
		 * Loads the Mail Manager options
		 */
		public static function loadMailMgr() {
			
		}
		
		/**
		 * Loads the MySQL Manager options
		 */
		public static function loadSQLMgr() {
			
		}
		
		/**
		 * Loads the "view statistics" button
		 */
		public static function loadStats() {
			
		}
		
		/**
		 * Loads the Account Management options
		 */
		public static function loadAccountMgr() {
			
		}
		
		/**
		 * Loads the Domain Management options
		 */
		public static function loadDomainMgr() {
			
		}
		
		/**
		 * Loads the Plugin Management options
		 */
		public static function loadPluginMgr() {
			
		}
		
		/**
		 * Ends the container
		 */
		public static function endLayout() {
			echo '</div>
				  </br>';
		}
	}