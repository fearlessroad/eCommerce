<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
		<link rel="stylesheet" href="/assets/css/adminlogin.css">
</head>
<body>
<?= validation_errors();?>

	<div id="container">
		<h2>Sup, Admin!</h2>
		<FIELDSET class="layout">
			<legend>Login</legend>
			<form action="/dashboards/login/" method="post">
				<label>Email</label><input type="email" name="email"><br>
				<label>Password</label><input type="password" name="password"><br>
				<button>Login</button>
			</form>
		</FIELDSET>
	</div>
</body>
</html>