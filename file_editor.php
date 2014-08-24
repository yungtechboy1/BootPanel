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
		if (isset($_POST['path']) && !empty($_POST['path'])) {
			$path = fopen($_POST['path'], "w") or die("Unable to open file!");
			$text = file_get_contents($file);
			if(!file_exists($_POST['path'])) {
				fopen($_POST['path'], "w") or die("Unable to create file!");
				$txt = null;
				fwrite($path, $txt);
				fclose($path);
				file_put_contents($_POST['path'], $txt);
			}
			
			if(isset($_POST['text'])) {
				$txt = $_POST['text'];
				fwrite($path, $txt);
				$txt = $_POST['text'];
				fwrite($path, $txt);
				fclose($path);
    			file_put_contents($_POST['path'], $_POST['text']);
			}
			echo "<form action='' method='post'><div class='modal fade'>
  					<div class='modal-dialog'>
    					<div class='modal-content'>
     			 			<div class='modal-header'>
        						<button type='button' class='close' data-dismiss='modal'><span aria-hidden='true'>&times;</span><span class='sr-only'>Close</span></button>
        						<h4 class='modal-title'>File Editor</h4>
      						</div>
      						<div class='modal-body'>
        						<textarea class='form-control' id='text' name='text'>" . htmlspecialchars($text) . "</textarea>
      						</div>
      						<div class='modal-footer'>
       		 					<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
        						<button type='button' type='save' id='save' class='btn btn-primary'>Save changes</button>
      						</div>
    					</div>
  					</div>
				  </div></form>";
		}
		echo "<form class='form-signin' action='' method='post'>
				<input class='form-control' name='path' placeholder='File Path' type='text' />
				<input class='btn btn-lg btn-info btn-block' type='submit' />
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