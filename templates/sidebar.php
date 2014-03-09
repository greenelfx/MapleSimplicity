<div class="col-xs-4 pushdown">
	<div class="panel panel-default">
	<div class="panel-heading"><span class="glyphicon glyphicon-cog"></span> Login Panel</div>
		<div class="panel-body">
		<?php
		if(!isset($_SESSION['id'])) {
		?>
			<form method="post" action="?page=login" autocomplete="off">	
				<div class="form-group">
					<input type="text" name="username" maxlength="12" class="form-control" placeholder="Username" id="username" required>
				</div>
				<div class="form-group">
					<input type="password" name="password" maxlength="36" class="form-control" placeholder="Password" id="password" required>
				</div>
				<button type="submit" id="login" class="btn btn-primary btn-block">Login</button>
			</form>
		<?php
		} else {
			echo "Welcome back ".$_SESSION['name']."<hr/>
			<a href=\"?page=settings\" class=\"btn btn-default btn-block\">Account Settings</a>
			<a href=\"?page=charfix\" class=\"btn btn-default btn-block\">Character Unstuck</a>";
			if(isset($_SESSION['admin'])) {
				echo "<a href=\"?page=manage_news\" class=\"btn btn-default btn-block\">Manage News</a>";
			}
			echo "<a href=\"?page=logout\" class=\"btn btn-primary btn-block\">Logout</a>";
		}
		?>
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