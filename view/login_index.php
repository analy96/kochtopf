<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="view/css/login_style.css">
 <link href="view/css/bootstrap.min.css" rel="stylesheet">
<title>Kochtopf - Login</title>
</head>
<body>
	<div class="main">
			<form action="default/login" method="post">
				<h3>Login</h3>
				<p>Username</p>
				<input name="name" type="text" class="form-control" placeholder="Username">
				</br>
				<p>Passwort</p>
				<input name="passwort" type="password" class="form-control" placeholder="Passwort">
				</br>
				</br>
				<button type="submit" class="btn btn-success">Login</button>
				<a href="User/" class="btn btn-default">Registrieren</a>
			</form>
	</div>
</body>
</html>