<?php
header('Content-type: text/html; charset=utf-8');
include 'model_frase.php';


$Frase = utf8_decode ($_GET ['frase']); #identifico la variabile su cui creare le righe
$Let = $_GET ['lettera']; #identifico le lettere 
$Lettere = []; #array delle lettere richieste
$Chars = []; #creo il contenitore delle lettere
$MaxCaratteri = 27; #imposto a 26 il numero massimo di caratteri per riga
$Cod_Frase =""; #frase codificata

$Black_style='Black';
$White_style='White';
$Normal_Style= 'Normal';



if (array_key_exists('soluzione',$_GET)){
	$Soluzione = $_GET ['soluzione']; #salvo la soluzione
}

if ($Soluzione == $Frase){
	$Let = 'ABCDEFGHILMNOPQRSTUVZWXYKY';
	echo utf8_encode($Soluzione);//
}


$Ver= Ver_Leng($Frase, $MaxCaratteri); #verifico che non ci siano parole che superano la lunghezza della riga

for($Nc = 0; $Nc<strlen($Let); $Nc++){ #array delle lettere richieste
	$Lettere []=$Let[$Nc];
}

$Cod_Frase = Codifica_stringa ($Frase, $MaxCaratteri); #codifico la frase

for($Nc=0;$Nc<strlen($Cod_Frase)-1;$Nc++){ #imposto lo stile
	$Arr = [];
	$Test = $Cod_Frase[$Nc];
	$Arr []= utf8_encode($Test);
	$Arr []=b_w_n($Test, $Black_style, $White_style, $Normal_Style);
	$Chars [] = $Arr;
}
//
if (array_key_exists('A',$Lettere)){
	$Key = array_search('À', array_column($Chars,[]));
		$Chars[$Key][1]= $Normal_Style;
		echo $Key . '<br>';//
}
//


foreach ($Lettere as $l){                  #modifico lo stile delle lettere giuste in normal
	foreach ($Chars as $Ar => &$Let){
		if ($Chars[$Ar][0]==$l){
			$Chars[$Ar][1]= $Normal_Style;
		}
	}
}



echo $Ver . '<br>';// verifica lungezza parole
echo $_GET ['frase'], '<br>'; // frase da url
echo $_GET ['lettera'], '<br>';// lettere da url
//print_r ($Lettere). '<br>'; // array lettere
echo $Cod_Frase . '<br>' ;// frase codificata
//print_r ($Chars); // griglia aggiornata

?>
<pre> <?php echo htmlspecialchars($Chars[43][0]);?> </pre>
<pre> <?php (print_r ($Lettere)); ?> </pre>
<pre> <?php (print_r ($Chars)); ?> </pre>