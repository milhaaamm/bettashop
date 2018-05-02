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
	<title> BETTA SHOP | Betta fish community and shop | </title>
</head>
<body>
	<div class="container-fluid" style="background-color: #dbdbdb">
		<div class="row">
			<div class="col-sm-8">
				<h1>Betta Shop <small>| Community | Shop | Altogether !</small></h1>
			</div><!--
			<div class="col-sm-4">
				<a href="<?=site_url('Login')?>" class="btn btn-primary btn-lg btn-block">Login</a>
			</div>-->
		</div>
		<div class="thumbnail">
			<img src="<?=BASE_URL('assets/bg/bg-landing.jpg')?>" class="img-rounded" alt="betta fish">
			<!--<p class="caption">This is Betta shop landing page</p>-->
		</div>
		<div class="panel-group">
			<div class="row">
				<div class="col-sm-8">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h2>Join Our Community !</h2>
						</div>
						<div class="panel-body">
							<form method="post" action="<?=site_url('register/user_register')?>" class="form-horizontal">
								<div class="form-group">
									<label class="label-control col-sm-2" for="fullname">Full Name : </label>
									<div class="col-sm-10">
										<input type="text" id="fullname" name="fullname" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="label-control col-sm-2" for="email">Email : </label>
									<div class="col-sm-9">
										<input type="email" id="email" name="email" class="form-control">
									</div>
									<label id="email-check" class="label-control col-sm-1"><span class="glyphicon glyphicon-refresh"></span></label>
								</div>
								<div class="form-group">
									<label class="label-control col-sm-2" for="username">Username : </label>
									<div class="col-sm-9">
										<input type="text" id="username" name="username" class="form-control">
									</div>
									<label id="username-check" class="label-control col-sm-1"><span class="glyphicon glyphicon-refresh"></span></label>
								</div>
								<div class="form-group">
									<label class="label-control col-sm-2" for="password">Password : </label>
									<div class="col-sm-10">
										<input type="password" id="password" name="password" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="label-control col-sm-2" for="password">Retype Password : </label>
									<div class="col-sm-9">
										<input type="password" id="password" name="repassword" class="form-control">
									</div>
									<label id="repass-check" class="label-control col-sm-1"><span class="glyphicon glyphicon-repeat"></span></label>
								</div>
								
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-1">
										<input type="checkbox" name="accept-agreement" id="accept-agreement" class="form-control">
									</div>
									<label class="label-control col-sm-4" for="accept-agreement"> By register to our community, you agree to out privacy and policy </label>
								</div>
								<div class="form-group">
									<div class="col-sm-offset-2 col-sm-10">
										<input type="submit" class="btn btn-primary btn-block" value="Join Now">
									</div>
								</div>
							</form>
						</div>
						<div class="panel-footer">
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2>Login to Community</h2>
						</div>
						<div class="panel-body">
							<form method="post" action="<?=site_url('login/auth_check')?>">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input type="text" class="form-control" name="username" placeholder="Username">
								</div>
								<br>
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input type="password" class="form-control" name="password" placeholder="Password">
								</div>
								
								<div class="form-group">
									<div class="checkbox">
										<label><input type="checkbox" name="rememberme">Remember Me!</label>
									</div>
								</div>
								<div class="btn-group">
									<input type="submit" value="Login" class="btn btn-primary btn-lg">
									<input type="reset" value="Reset" class="btn btn-danger btn-lg">
								</div>
							</form>
						</div>
						<div class="panel-footer">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>