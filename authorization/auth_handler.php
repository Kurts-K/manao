<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

$login = trim(htmlspecialchars(stripslashes($_POST['login'])));
$password = trim(htmlspecialchars(stripslashes($_POST['password'])));
$ip = $_SERVER['REMOTE_ADDR'];
$agent = $_SERVER['HTTP_USER_AGENT'];

$sault = 'u4h3f7h4387hfqp';
$password_hash_auth = md5($password) . $sault; 


$_SESSION[login_auth] = $login;
$_SESSION[password_auth] = $password;
$_SESSION[error_request_handler] = $error_request_handler;

$xml_auth = simplexml_load_file("../registration/users.xml");

$pass_log = $xml_auth->xpath("user[login = '$login']/password");


if ($pass_log[0] == $password_hash_auth)
{
	setcookie('key_cookie', md5($ip) . md5($agent), time() + 60 * 60, "/");
	$_SESSION[key_session] = md5($login) . md5($_COOKIE['key_cookie']) . md5($password);
	header('Location: ../index.php');
} else { 
	$error_request_handler = 'Неверный логин или пароль';
	header('Location: authorization.php');
}





?>








