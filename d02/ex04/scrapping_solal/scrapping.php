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
fputcsv($fp, array("num_page","url", "nom_vin", "annee", "nb_etoiles", "prix", "coup de coeur", "garde", "production", "elevage", "temperature", "cepages", "address"));
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
curl_setopt ($ch,CURLOPT_POSTFIELDS,"_username=solal.sabbah@gmail.com&_password=galousab132&_csrf_token=683ef1b1a72b089af22b44a6e1392fd6f16f3d6f");
// $str = curl_exec($ch);

for($page_nb = 1; $page_nb <= 67; $page_nb++) {
	$url = "http://www.hachette-vins.com/vins/page-" . $page_nb . "/list/?filtre%5Bedition%5D=2017&filtre%5Bregion%5D=Bordelais&filtre%5Bcouleur%5D=rouge";
	curl_setopt($ch, CURLOPT_URL, $url);
	$str = curl_exec($ch);

	preg_match_all ('/<div class="item">\n[" "]*<div class="wine-type">.*?<div class="title"><a href="(.*?)">(.*?)<\/a><\/div>.*?"year">(.*?)<.*?<span class="rating">(.*?)<\/span>.*?"price">(.*?)<\/div>/s',$str,$matches);

	for ($i = 0; $i <= 14; $i++) {
		$nb_etoiles = preg_match_all('/(red)/',$matches[4][$i], $nw);
		$url = $matches[1][$i];
		// var_dump($url);
		curl_setopt($ch, CURLOPT_URL, $url);
		$str = curl_exec($ch);
		$fav = (preg_match_all('/(icon icon-heart-red)/', $str, $nw) == 1) ? "oui" : "non";
		// var_dump($str);
		// var_dump($nw);
		preg_match_all('/GARDE :.*?value\">(.*?)<\/div>/s', $str, $garde);
		preg_match_all('/PRODUCTION :.*?value\">(.*?)<\/div>/s', $str, $prod);
		preg_match_all('/ÉLEVAGE :.*?value\">(.*?)<\/div>/s', $str, $elevage);
		preg_match_all('/TEMPÉRATURE :.*?value\">(.*?)<\/div>/s', $str, $temp);
		preg_match_all('/PRINCIPAUX CÉPAGES<\/div>(.*?)<\/td>/s', $str, $cepages);
		preg_match_all('/<address>(.*?)<\/address>/s', $str, $address);
		// var_dump($garde[1][0]);
		// var_dump($prod[1][0]);
		// var_dump($elevage[1][0]);
		// var_dump($temp[1][0]);
		// var_dump($cepages[1][0]);
		// var_dump($address[1][0]);
		// return ;
		// var_dump($retour_preg);
		echo $fav . "\n";
		fputcsv($fp, array($page_nb, $matches[1][$i], $matches[2][$i], $matches[3][$i], $nb_etoiles, $matches[5][$i], $fav,
												$garde[1][0], $prod[1][0], $elevage[1][0], $temp[1][0], $cepages[1][0], $address[1][0]));
	}
}

// fclose($fp);

?>
