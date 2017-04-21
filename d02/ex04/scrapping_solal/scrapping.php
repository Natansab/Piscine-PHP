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
$fp = fopen("./data.csv", "w");
fputcsv($fp, array("num_page","url", "nom_vin", "annee", "nb_etoiles", "prix", "coup de coeur"));
// foreach($links as $fields)
// 	fputcsv($fp, array($fields));
// fclose($fp);

$url = "http://www.hachette-vins.com/login_check";

$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $url);
$cookie = 'cookies.txt';
$timeout = 30;
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_TIMEOUT,         10);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,  $timeout );
curl_setopt($ch, CURLOPT_COOKIEJAR,       $cookie);
curl_setopt($ch, CURLOPT_COOKIEFILE,      $cookie);

curl_setopt ($ch, CURLOPT_POST, 1);
curl_setopt ($ch,CURLOPT_POSTFIELDS,"_username=xxx&_password=xxx&_csrf_token=c55623574318681da51e350df25bad462a34ebab");
// $str = curl_exec($ch);

for($page_nb = 1; $page_nb <= 67; $page_nb++) {
	$url = "http://www.hachette-vins.com/vins/page-" . $page_nb . "/list/?filtre%5Bedition%5D=2017&filtre%5Bregion%5D=Bordelais&filtre%5Bcouleur%5D=rouge";
	curl_setopt($ch, CURLOPT_URL, $url);
	$str = curl_exec($ch);

	preg_match_all ('/<div class="item">\n[" "]*<div class="wine-type">.*?<div class="title"><a href="(.*?)">(.*?)<\/a><\/div>.*?"year">(.*?)<.*?<span class="rating">(.*?)<\/span>.*?"price">(.*?)<\/div>/s',$str,$matches);

	for ($i = 0; $i <= 14; $i++) {
		$nb_etoiles = preg_match_all('/(red)/',$matches[4][$i], $nw);
		$url = $matches[1][$i];
		curl_setopt($ch, CURLOPT_URL, $url);
		$str = curl_exec($ch);
		$fav = (preg_match_all('/(icon icon-heart-red)/', $str, $nw) == 1) ? "oui" : "non";
		echo $fav . "\n";
		fputcsv($fp, array($page_nb, $matches[1][$i], $matches[2][$i], $matches[3][$i], $nb_etoiles, $matches[5][$i], $fav));
	}
}

// fclose($fp);

?>
