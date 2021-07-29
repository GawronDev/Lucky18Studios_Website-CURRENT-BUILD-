<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
print json_encode(array('message' => 'Imie nie moze być puste', 'code' => 0));
exit();
}
if ($email === ''){
print json_encode(array('message' => 'Email nie moze byc pusty', 'code' => 0));
exit();
} else {
if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
print json_encode(array('message' => 'Niepoprawna forma maila', 'code' => 0));
exit();
}
}
if ($subject === ''){
print json_encode(array('message' => 'Temat nie moze byc pusty', 'code' => 0));
exit();
}
if ($message === ''){
print json_encode(array('message' => 'Wiadomosc nie moze byc pusta', 'code' => 0));
exit();
}
$content="From: $name \nEmail: $email \nMessage: $message";
$recipient = "biuro@lucky18.com.pl";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
print json_encode(array('message' => 'Wiadomosc wyslana!', 'code' => 1));
exit();
?>