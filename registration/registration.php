<?
header('Content-Type: text/html; charset=utf-8');
session_start(); ?>
<!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<title>Регистрация</title>
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>


<form action="request_handler.php" method="post" name="reg_form" class="reg_form" >

<div class="form_float">


	<div class="field">
		<label for="name">Login</label>
		<input type="text" name="login" id="login" 
		value="<? echo $_SESSION[login] ?>">
	</div>
	
	<div class="field">
		<label for="password">Password</label>
		<input type="text" name="password" id="password" 
		value="<? echo $_SESSION[password] ?>">
	</div>
	
	<div class="field">
		<label for="confirm_password">Confirm password</label>
		<input type="text" name="confirm_password" id="confirm_password"
		value="<? echo $_SESSION[confirm_password] ?>">
	</div>
	
	<div class="field">
		<label for="email">E-mail</label>
		<input type="text" name="email" id="email" 
		value="<? echo $_SESSION[email] ?>">
	</div>
	
	

	<div class="field">
		<label for="name">Name</label>
		<input type="text" name="name" id="name" 
		value="<? echo $_SESSION[name] ?>">
	</div>

	
</div>
<div class="clear"></div>

<div>
<p><? echo $_SESSION[error_request_handler] ?></p>

</div>


<br />
<input type="submit" value="registration" class="submit_button">


</form>
<center><a class="a_back" href="../index.php">На главную</a></center>

</body>