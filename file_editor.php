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
          				<a class='navbar-brand'>BootPanel</a>
        			</div>
        			<div class='collapse navbar-collapse'>
          				<ul class='nav navbar-nav'>
            				<li><a href='dashboard.php'>Dashboard</a></li>
            				<li class='active'><a href='file_editor.php'>File Editor</a></li>
            				<li><a href='stats.php'>Statistics</a></li>
          				</ul>
						<ul class='nav navbar-nav navbar-right'>
							<li class='active'><a onClick=". $actions->logout() ." >Sign Out</a></li>
						</ul>
        			</div>
    	  		</div>
    		  </div>";
		
		//Show File Editor
		$url = 'file_editor.php';
		if (isset($_POST['text']) && isset($_POST['path'])) {
			if(!file_exists($_POST['path'])) {
				fopen($_POST['path'], "w") or die("Unable to create file!");
			}
			$path = fopen($_POST['path'], "w") or die("Unable to open file!");
			$txt = null;
			fwrite($path, $txt);
			$txt = "Jane Doe\n";
			fwrite($path, $txt);
			fclose($path);
    		file_put_contents($_POST['path'], $_POST['text']);
    		header(sprintf('Location: %s', $url));
    		printf('<a href="%s">Moved</a>.', htmlspecialchars($url));
    		exit();
		}
		$text = file_get_contents($file);
		echo "<form class='form-signin' action='' method='post'>
				<input class='form-control' name='path' placeholder='File Path' type='text' />
				<textarea class='form-control' placeholder='File Text' name='text'>" . htmlspecialchars($text) . "</textarea>
				<input class='btn btn-lg btn-info btn-block' type='submit' />
				<input class='btn btn-lg btn-danger btn-block' type='reset' />
			  </form>";
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