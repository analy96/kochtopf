<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
 <link href="../view/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../view/css/login_style.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>Kochtopf - Registrieren</title>


<script type="text/javascript">
$(function(){
$("form").submit(function(event){
	if($('.validation_nok').length > 0){
		event.preventDefault();
	}
/*	var jqxhr = $.ajax( "../model/RegistrierenModel.php?n="+$('#benutzername').val())
	.done(function(data) {
		var pw_pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/i;
		if(data == 'true'){
			if($('#passwort_w').val() == $('#passwort').val()){
				if($('#benutzername').val().length > 3 && $('#benutzername').val().length < 20){
					if($('#passwort').val().match(pw_pattern)){
						alert("Success");

					}else{
						event.preventDefault();
						alert("Passwort muss min 1 Buchstaben, 1 Zahl und 1 Sonderzeichen enthalten");
					}
				}else{
					event.preventDefault();
					alert("Benutzername muss zwischen 3 und 20 Zeichen lang sein");
				}
			}else{
				event.preventDefault();
				alert("Passwort wurde nicht richtig widerholt");
			}
		}else{
			event.preventDefault();
			alert( data );
		}
	});*/
});
	$('#benutzername').change(function () {
		if($('#benutzername').val().length > 3){
			$('#benutzername').removeClass('validation_nok');
			$('#benutzername').removeClass('validation_ok');
			var jqxhr2 = $.ajax( "../model/RegistrierenModel.php?n="+$('#benutzername').val())
			.done(function(data){
				if(data == 'true'){
					$('#benutzername').addClass("validation_ok");
				}else{
					$('#benutzername').addClass("validation_nok");
				}
			});
		}else{
			$('#benutzername').removeClass('validation_nok');
			$('#benutzername').removeClass('validation_ok');
		}

	});

	$('#passwort_w').change(function () {
		$('#passwort_w').removeClass('valdiation_nok');
		$('#passwort_w').removeClass('validation_ok');
		$('#passwort').removeClass('valdiation_nok');
		$('#passwort').removeClass('validation_ok');
		if($('#passwort_w').val() == $('#passwort').val()){
			$('#passwort_w').addClass("validation_ok");
			$('#passwort').addClass("validation_ok");
		}else{
			$('#passwort_w').addClass("validation_nok");
			$('#passwort').addClass("validation_nok");
		};
	});
});
</script>
</head>
<body>
	<div class="main_r">
			<form action="/User/doCreate" method="post" name="form">
				<h3>Registration</h3>
				<p>Benutzername</p>
				<input name="benutzername" id="benutzername" type="text" class="form-control" placeholder="Benutzername" required="required">
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
				<label class="radio-inline"><input type="radio" name="geschlecht">Männlich</label>
				<label class="radio-inline"><input type="radio" name="geschlecht">Weblich</label>
				</br>
				</br>
				<p>Passwort</p>
				<input id="passwort" name="passwort" type="password" class="form-control" placeholder="Passwort" required="required">
				</br>
				<p>Passwort wiederholen</p>
				<input id="passwort_w" name="passwort_wiederholen" type="password" class="form-control" placeholder="Passwort wiederholen" required="required">
				</br>
				</br>
				<button type="submit" class="btn btn-success">Registrieren</button>
				<a href="/" class="btn btn-default">Zurück</a>
			</form>
	</div>
</body>
</html>
