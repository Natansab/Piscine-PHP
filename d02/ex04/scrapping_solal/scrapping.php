#!/usr/bin/php
<?php
$file_path = "./links_sample";
if (!file_exists($file_path)) {
	echo "fichier links manquant\n";
	return ;
}
$links = file($file_path);
// print_r($links);
// if (file_exists("./data.csv")) {
// 	echo "data.csv existe deja\n";
// 	return ;
// }
// $fp = fopen("./data.csv", "w");
// fputcsv($fp, array("url", "nom_vin", "annee", "nb_etoiles", "coup_de_coeur"));
// foreach($links as $fields)
// 	fputcsv($fp, array($fields));
// fclose($fp);

//username and password of account
$username = "solal.sabbah@gmail.com";
$password = "galouskab132";

//login form action url
$url="http://www.hachette-vins.com/login_check";
$postinfo = "_username=".$username."&_password=".$password;

$cookie_file_path = "./cookie.txt";

$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_NOBODY, false);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
//set the cookie the site has for certain features, this is optional
curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
curl_setopt($ch, CURLOPT_USERAGENT,
    "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postinfo);
curl_exec($ch);

$c = curl_init("http://www.hachette-vins.com/vins/page-62/list/?filtre%5Bedition%5D=2017&filtre%5Bregion%5D=Bordelais&filtre%5Bcouleur%5D=rouge");
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$str = curl_exec($c);
curl_close($c);
preg_match_all ('/<div class="item">\n[" "]*<div class="wine-type">.*?<div class="title"><a href="(.*?)">(.*?)<\/a><\/div>.*?"year">(.*?)<.*?<span class="rating">(.*?)<\/span>.*?"price">(.*?)<\/div>/s',$str,$matches);
print_r($matches);
fclose($fp);

?>
