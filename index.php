<?php
	session_start();
	ob_start();

	include_once 'api/actions.php';
	include_once 'assets/includes/header.php';
	
	$actions = new actions();
	
	if(file_exists("install/install.php") && !file_exists("config/conf.php")) {
		echo "<center>
				<div class='container'>
			 		<a class='btn btn-lg btn-warning btn-block' href='install/install.php'>Install BootPanel</a></br>
					<a class='btn btn-lg btn-danger btn-block' href='http://bootpanel.com/'>Visit BootPanel Website</a>
				</div>
			<center>";
	}elseif(file_exists("install/install.php") && file_exists("config/conf.php")){
		include_once 'config/conf.php';
		echo "<center>
				<div class='container'>
					<p class='alert alert-warning'>
						It appears that BootPanel is installed on your machine.
						For security reasons, we require that you delete the BootPanel install directory before using the software.
					</p>
					<form class='form-signin' role='form'>
						<h2 class='form-signin-heading'>BootPanel</h2>
						<hr>
						<p>
							Login Disabled!</br>
							You must delete the installer before logging in!
						</p>
					</form>
				</div>
			 <center>";
	}else{
		include_once 'config/conf.php';
		
		if(isset($_POST['username']) && isset($_POST['password']) && $_POST['username'] == $ROOT_USER && $_POST['password'] == $ROOT_PASS){
			$actions->login();
			header("dashboard.php");
		}elseif(isset($_POST['username']) && isset($_POST['password'])){
			echo "<center><p class='alert alert-danger'>Invalid username/password!</p></center>";
		}
		
		echo "<center>
				<div class='container'>
					<form class='form-signin' action='' role='form'>
						<h2 class='form-signin-heading'>BootPanel</h2>
						<hr>
						<input type='text' class='form-control' name='username' placeholder='Username' required='' autofocus=''>
						<input type='password' class='form-control' name='password' placeholder='Password' required=''>
						<div class='checkbox'>
          					<label>
            					<input type='checkbox' value='remember-me'> Remember me
          					</label>
        				</div>
						<button class='btn btn-lg btn-info btn-block' type='submit'>Sign In</button>
					</form>
				</div>
			  </center>";
	}
	
	include_once 'assets/includes/footer.php';
?>