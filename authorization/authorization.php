<?
header('Content-Type: text/html; charset=utf-8');
session_start();
 ?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Авторизация</title>
	<link rel="stylesheet" href="../css/style.css">
</head>

<body>


<form action="auth_handler.php" method="post" name="auth_form" class="auth_form">


<div class="form_float">

<h5>Введите логин и пароль для авторизации</h5>




<div class="field">
<label for="login">login</label>
<input type="login" name="login" 
value="<? echo $_SESSION[login_auth] ?>">
</div>

<div class="field">
<label for="password">password</label>
<input type="password" name="password"
value="<? echo $_SESSION[password_auth] ?>">
</div>







<input type="submit" id="submit_auth">

<div>
<p class="error_message_p"><? echo $_SESSION[error_request_handler]; ?></p>
</div>
</div>


<div class="clear"></div>
</form>
<center><a class="a_back" href="../index.php">На главную</a></center>
</body>
</head>
