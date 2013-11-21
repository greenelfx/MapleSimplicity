<div class="col-xs-4 pushdown">
<div class="panel panel-default">
<div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> Login Panel</div>
	<div class="panel-body">
		<form method="post" action="" autocomplete="off">	
			<div class="form-group">
				<input type="text" name="username" maxlength="12" class="form-control" placeholder="Username" id="username" required>
			</div>
			<div class="form-group">
				<input type="password" name="password" maxlength="36" class="form-control" placeholder="Password" id="password" required>
			</div>
			<a id="login" class="btn btn-primary btn-block">Login</a>
		</form>
	</div>
</div>
<div class="panel panel-default">
	<div class="panel-heading"><span class="glyphicon glyphicon-stats"></span> Server Status</div>
	<div class="panel-body">
		<?php include("status.php");?>
	</div>
</div>

</div>
<div class="col-xs-8">