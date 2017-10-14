<?php include("head.php"); ?>
<?php include("navigation.php"); ?>
<?php include("carousel.php"); ?>
<div class="main-body">
<h2 class="page-heading">Admin Login</h2>
	<div class="container marketing">
		<div class="featurette-login">
			<form id="login-form" class="form-horizontal">
				<div class="form-group">
					<label for="inputAdminName" class="control-label col-xs-2">Username</label>
					<div class="col-xs-5">
						<input name="user-name" class="form-control" id="inputAdminName" placeholder="Username">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="control-label col-xs-2">Password</label>
					<div class="col-xs-5">
						<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">
					</div>
				</div>
				<p id="errorLogin"></p>
				<div class="col-sm-offset-2">
				<input type="submit" id="sendLoginCreate" name="sendLoginCreate" value="Create Service Info" class="btn btn-primary">
				<input type="submit" id="sendLoginEdit" name="sendLoginEdit" value="Edit Service Info" class="btn btn-primary">
				<input type="hidden" id="adminType" name="adminType">
				</div>
				</form>
		</div>
	</div>
<?php include("map.php") ?>
	
</div>


<?php include("footer.php") ?>