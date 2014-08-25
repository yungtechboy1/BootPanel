<?php
session_start();
ob_start();

require_once 'config/conf.php';

$isLoggedIn = false;

require_once 'assets/includes/header.php';
require_once 'assets/includes/nav.php';
?>

	<!-- Main Site Text -->
	<div class="container">
		<div class="jumbotron">
			<center>
				</br>
				<noscript>
					<div>
						<p class="alert alert-danger">BootPanel uses JavaScript to run which is not enabled on your browser!</p>
					</div>
				</noscript>
				<h1>BootPanel</h1>
				<hr>
				<h2>File Management</h2>
				<p>
					<a type="button" class="btn btn-success" data-toggle="modal" data-target="#files">Files </a>
				</p>
				<hr>
				<h2>BootPanel Scripts</h2>
				<p>
					<a type="button" class="btn btn-info" data-toggle="modal" data-target="#update">Update</a>
				</p>
				<hr>
			</center>
		</div>
	</div>
	
	<!-- Show Files -->
	<div class="modal fade" id="files" tabindex="-1" role="dialog" aria-labelledby="filesLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<center><h4 class="modal-title" id="filesLabel">Server Files</h4></center>
				</div>
				<div class="modal-body">
					<center>
						<?php
							if($isLoggedIn) {
								?>
									<!-- TODO: Show Files -->
								<?php
							}else{
								?>
									<p class="alert alert-danger">You must be signed in to do that</p>
									<p><a type="button" class="btn btn-default" data-toggle="modal" data-target="#login">Sign In</a></p>
								<?php
							}
						?>
					</center>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Show Login -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="loginLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<center><h4 class="modal-title" id="loginLabel">Sign In</h4></center>
				</div>
				<div class="modal-body">
					<center>
						<?php
							if($isLoggedIn) {
						?>
									<p class="alert alert-success">You have been logged in!</p>
						<?php
							}else{
								if(isset($_POST['username']) && isset($_POST['password'])) {
									$username = strtolower($_POST['username']);
									$password = $_POST['password'];
									if($username == $ROOT_USER) {
										if($password == $ROOT_PASS) {
											$isLoggedIn = true;
						?>
											<p class="alert alert-success">You have been logged in!</p>
						<?php
										}else{
						?>
											<p class="alert alert-danger">Invalid Username/Password!</p>
						<?php
										}
									}else{
						?>
										<p class="alert alert-danger">Invalid Username/Password!</p>
						<?php
									}
								}
						?>
								<div class="container">
     								<form class="form-signin" role="form">
        								<input type="username" name="username" class="form-control" placeholder="Username" required="" autofocus="">
        								<input type="password" name="password" class="form-control" placeholder="Password" required="">
        								<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      								</form>
    							</div>
						<?php
							}
						?>
					</center>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	
<?php
require_once 'assets/includes/footer.php';
?>