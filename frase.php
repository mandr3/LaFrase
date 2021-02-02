<?php 
include 'model_frase.php';

$String= "aaa#frase#di#prova#per#verificare,#il#funzionamento,#mandr3@gmail.com aaa";
$Lettere =['a','b', 'c'];
$Array = [];

$Array= Griglia($String);

print_r ($Lettere);

echo '<br>';

foreach ($Lettere as $l){
	foreach ($Array as $Ar => &$Let){
		if ($Array[$Ar][0]==$l){
			$Array[$Ar][1]='normal';
		}
	}
}





print_r ($Array);

?>