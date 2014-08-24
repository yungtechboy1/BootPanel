<?php
	session_start();
	ob_start();

	include_once 'api/actions.php';
	include_once 'assets/includes/header.php';
	
	$actions = new actions();
	
	if($actions->checkLoggedin() == true){
		//Show Navigation Bar
		echo "<div class='navbar navbar-default navbar-fixed-top' role='navigation'>
      			<div class='container'>
        			<div class='navbar-header'>
          				<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='.navbar-collapse'>
            					<span class='sr-only'>Toggle navigation</span>
            					<span class='icon-bar'></span>
            					<span class='icon-bar'></span>
            				<span class='icon-bar'></span>
          				</button>
          				<a class='navbar-brand' href='#'>BootPanel</a>
        			</div>
        			<div class='collapse navbar-collapse'>
          				<ul class='nav navbar-nav'>
            				<li class='active'><a href='dashboard.php'>Dashboard</a></li>
            				<li><a href='file_editor.php'>File Editor</a></li>
            				<li><a href='stats.php'>Statistics</a></li>
          				</ul>
						<ul class='nav navbar-nav navbar-right'>
							<li class='active'><a onClick=". $actions->logout() ." >Sign Out</a></li>
						</ul>
        			</div>
    	  		</div>
    		  </div>";
		
		//Show Dashboard
		echo "";
	}else{
		header("index.php");
		echo "<center>
				<h2>BootPanel</h2>
				<p class='alert alert-danger'>
					You must be logged in to view this page!
				</p>
			  </center>";
	}
	
	include_once 'assets/includes/footer.php';
?>