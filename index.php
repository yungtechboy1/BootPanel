<?php
session_start();
ob_start();

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
					<a type="button" class="btn btn-success" href="#files">Files </a>
				</p>
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
						<p>
							<?php
								if($isLoggedIn) {
									?>
										<!-- TODO: Show Files -->
									<?php
								}else{
									?>
										<!-- TODO: Force login -->
									<?php
								}
							?>
						</p>
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