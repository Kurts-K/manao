<?php
header('Content-Type: text/html; charset=utf-8');
session_start();

$login = trim(htmlspecialchars(stripslashes($_POST['login']))); 
$password = trim(htmlspecialchars(stripslashes($_POST['password'])));
$confirm_password = trim(htmlspecialchars(stripslashes($_POST['confirm_password'])));
$email = trim(htmlspecialchars(stripslashes($_POST['email']))); 
$name = trim(htmlspecialchars(stripslashes($_POST['name'])));



$_SESSION[error_request_handler] = $error_request_handler;
$_SESSION[login] = $login;
$_SESSION[password] = $password;
$_SESSION[confirm_password] = $confirm_password;
$_SESSION[email] = $email;
$_SESSION[name] = $name;



if (iconv_strlen($login) == 0)
	$error_request_handler = 'Логин не заполнен';
else if (iconv_strlen($password) == 0)
	$error_request_handler = 'Пароль не заполнен';
else if (iconv_strlen($email) == 0)
	$error_request_handler = 'email не заполнен';
else if (iconv_strlen($name) == 0)
	$error_request_handler = 'Имя не заполнено';



if ($password != $confirm_password) 
	$error_request_handler = 'Пароли не сопадают';
else {
	$sault = 'u4h3f7h4387hfqp';
	$password = md5($password) . $sault; 
}



//unique
$xml_uniq = simplexml_load_file("users.xml");

$email_xpath = $xml_uniq->xpath("user/email");
$login_xpath = $xml_uniq->xpath("user/login");
$reg_count = count($email_xpath);

for ($i=0; $i<$reg_count; $i++) {
	if ($email_xpath[$i] == $email)
		$error_request_handler = 'Емейл уже зарегистрирован';
	if ($login_xpath[$i] == $login)
		$error_request_handler = 'Логин уже зарегистрирован';
}





if (iconv_strlen($error_request_handler) == 0) { //если нет ошибок пишем в xml
	


$xml = new DomDocument('1.0', 'utf-8');
$xml->load("users.xml");

$users_xml = $xml->getElementsByTagName('users')->item(0);
	$user_xml = $users_xml->appendChild($xml->createElement('user'));
	
	//$user_xml->setAttribute("email", "$email");
	
		$login_xml = $user_xml->appendChild($xml->createElement('login'));
		$password_xml = $user_xml->appendChild($xml->createElement('password'));
		$email_xml = $user_xml->appendChild($xml->createElement('email'));
		$name_xml = $user_xml->appendChild($xml->createElement('name'));
		
		
		$login_xml->appendChild($xml->createTextNode("$login"));
		$password_xml->appendChild($xml->createTextNode("$password"));
		$email_xml->appendChild($xml->createTextNode("$email"));
		$name_xml->appendChild($xml->createTextNode("$name"));
		
		
		
		
$xml->formatOutput = true;
$xml->save('users.xml');


header('Location: ..\authorization\authorization.php');

} else 




header('Location: registration.php');







?>