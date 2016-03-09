<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="view/css/login_style.css">
 <link href="view/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>Kochtopf - Login</title>
<script type="text/javascript">
$(function(){
$("form").submit(function(event){
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
});
</script>
</head>
<body>
	<div class="main">
			<form action="/home" method="post" name="form">
				<h3>Login</h3>
				<p>Username</p>
				<input name="name" type="text" class="form-control" placeholder="Benutzername" required="required">
				</br>
				<p>Passwort</p>
				<input name="passwort" type="password" class="form-control" placeholder="Passwort" required="required">
				</br>
				</br>
				<button type="submit" class="btn btn-success">Login</button>
				<a href="User/" class="btn btn-default">Registrieren</a>
			</form>
	</div>
</body>
</html>