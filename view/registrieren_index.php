<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="../view/css/login_style.css">
 <link href="../view/css/bootstrap.min.css" rel="stylesheet">
<title>Kochtopf - Registrieren</title>

	
<script type="text/javascript">
function validate(){
	return false;
</script>
</head>
<body>
	<div class="main_r">
			<form action="User/" method="post" onsubmit="return validate()" name="form">
				<h3>Registration</h3>
				<p>Benutzername</p>
				<input name="benutzername" type="text" class="form-control" placeholder="Benutzername">
				</br>
				<p>Vorname</p>
				<input name="vorname" type="text" class="form-control" placeholder="Vorname" required="required">
				</br>
				<p>Nachname</p>
				<input name="nachname" type="text" class="form-control" placeholder="Nachname" required="required">
				</br>
				<p>E-mail</p>
				<input name="email" type="email" class="form-control" placeholder="E-Mail" required="required">
				</br>
				<p>Alter</p>
				<input name="alter" type="number" class="form-control" placeholder="Alter" required="required">
				</br>
				<p>Geschlecht</p>
				<label class="radio-inline"><input type="radio" name="optradio">Männlich</label>
				<label class="radio-inline"><input type="radio" name="optradio">Weblich</label>
				</br>
				</br>
				<p>Passwort</p>
				<input name="passwort" type="password" class="form-control" placeholder="Passwort" required="required">
				</br>
				<p>Passwort wiederholen</p>
				<input name="passwort_wiederholen" type="password" class="form-control" placeholder="Passwort wiederholen" required="required">
				</br>
				</br>
				<button type="submit" class="btn btn-success">Registrieren</button>
				<a href="/" class="btn btn-default">Zurück</a>
			</form>
	</div>
</body>
</html>