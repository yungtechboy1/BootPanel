<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="logoutLabel">Logout?</h4>
			</div>
			<div class="modal-body">
				<center><p>Are you sure you would like to logout?</p></center>
			</div>
			<div class="modal-footer">
				<center>
					<a type="button" class="btn btn-success" href="./?logout">Yes</a>
					<a type="button" class="btn btn-danger" data-dismiss="modal">No</a>
				</center>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="changePassLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				<h4 class="modal-title" id="logoutLabel">Change Password</h4>
			</div>
			<div class="modal-body">
				<div class="alert alert-warning fade in" role="alert">
					<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<strong>Warning:</strong> You <strong>WILL</strong> be logged out upon successful password change!
				</div>
				<center>
					<form method="post">
						<input class="form-control" type="password" name="old_password" placeholder="Current Password" required><br>
						<input class="form-control" type="password" name="new_password" placeholder="New Password" required><br>
						<input class="form-control" type="password" name="conf_new_password" placeholder="Confirm New Password" required><br>
						<button class="btn btn-lg btn-block btn-info" type="submit">Change Password</button>
					</form>
				</center>
			</div>
			<div class="modal-footer">
				<a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
			</div>
		</div>
	</div>
</div>