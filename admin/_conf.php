<?php
$mysqli = mysqli_connect('localhost', 'root', '', 'rulmansoft');
mysqli_set_charset($mysqli, "utf8");

// fonksiyonlarda mysqli_query kullanmak icin connect() adında bir fonksiyon olusturuyoruz.
function mysqli()
{
	global $mysqli;
	return $mysqli;
}


// default
$site_url = 'http://localhost/RulmanSoft/admin';
$theme_url = 'http://localhost/RulmanSoft';
$account_url = 'http://localhost/RulmanSoft/accounts';
?>
