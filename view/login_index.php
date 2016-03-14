<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="/view/css/login_style.css">
 <link href="/view/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>Kochtopf - Login</title>
<script type="/text/javascript">
/*$("form").submit(function(event){
var jqxhr = $.ajax( "../controller/DefaultController.php?n="+$('#name').val())
	.done(function(data) {
		if(data == 'true'){
			alert("Success");
		}else{
			event.preventDefault();
			alert(data);
			alert(data);
		}
	});
});
});*/
</script>
</head>
<body>
	<div class="main">
			<form action="/default/Login" method="post" name="form">
				<h3>Login</h3>
				<p>Username</p>
				<input name="name" type="text" class="form-control" placeholder="Benutzername" required="required" value="<?php echo (isset($_POST['name'])) ? $_POST['name'] : '' ?>">
				</br>
				<p>Passwort</p>
				<input name="passwort" type="password" class="form-control" placeholder="Passwort" required="required">
        <p class="<?php echo (isset($_POST['fehler'])) ? 'fehler' : 'nfehler'?>">Das Passwort stimmt nicht mit dem Benutzername überein!</p>
				</br>
				</br>
				<button type="submit" class="btn btn-success">Login</button>
				<a href="/User/index" class="btn btn-default">Registrieren</a>
			</form>
	</div>
</body>
</html>
