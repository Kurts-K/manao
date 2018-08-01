<?php
header('Content-Type: text/html; charset=utf-8');
session_start();?>
<!doctype html>

<html>

<head>
	<meta charset="utf-8">
	<title>Манао</title>
	<link rel="stylesheet" href="css/style.css">
</head>

<body class="start">

<div class="auth_false">
<h1>Веб приложение для регистрации и авторизации!</h1>
<a href="registration/registration.php">Регистрация</a>
<a href="authorization/authorization.php">Авторизация</a>
<?
if (($_SESSION[key_session] == md5($login) . md5($_COOKIE['key_cookie']) . md5($password)) ||
	($_COOKIE["key_cookie"] == md5($_SERVER['REMOTE_ADDR']) . md5($_SERVER['HTTP_USER_AGENT'])))
$_SESSION[auth_true] = 'true'; ?>
</div>

<div class="auth_true">
<h2>Hello, <? echo $_SESSION[name] ?></h2>

</div>


</body>




</html>