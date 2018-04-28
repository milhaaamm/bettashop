<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title> BETTA SHOP | login </title>
</head>
<body style="background-color:#eaeaea">
	<div class="container-fluid" >
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<h1>Login to Community</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<form method="post" action="login/auth_check">
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Username">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="input-group">
						<input type="submit" value="Login" class="btn btn-primary">
						<input type="reset" value="Reset" class="btn btn-danger">
					</div>
				</form>
			</div>
			<div class="col-sm-4">
			</div>
		</div>
	</div>
</body>
</html>