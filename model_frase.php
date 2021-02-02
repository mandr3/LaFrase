<?php

Function Ver_Leng ($String, $Ncaratteri){
	foreach (explode(" ", $String) as $str) {
		if(strlen($str)>$Ncaratteri){
			$Ver_Leng = 'False';
		}Else{
			$Ver_Leng = 'True';}
	}
return $Ver_Leng;
}



Function Codifica_stringa ($String, $Ncaratteri){

$String_cod="";

while (strlen($String) > 0){ #fin a quando la lunghezza della stringa è maggiore di 0 elaboro
	$String = ($String);
	if (strlen($String) > $Ncaratteri){ #se la stringa ha piu dei caratteri massi elaboro
		$PrimoTaglio = substr($String, 0, $Ncaratteri); #primo taglio al numero massimo di caratteri
		$UltimoSpazio = strrpos($PrimoTaglio, " "); 
		$Riga = substr($String, 0, $UltimoSpazio); #tagio fino all'ultimo spazio

		while (strlen($Riga) < $Ncaratteri){
		$Riga= "$Riga#";}

        $String_cod= $String_cod . $Riga;
		$String = substr($String, $UltimoSpazio+1, strlen($String)); #taglio la prima parte della

	}else{
		$Riga= $String; #aggiungo l'ultima riga
		while (strlen($Riga) < $Ncaratteri){
		$Riga= "$Riga#";}
		$String_cod= $String_cod . $Riga;
		$String = "";
	}
}
$String_cod = str_replace(" ", "#", $String_cod);
return $String_cod;
}


Function b_w_n ($String, $Stile_b, $Stile_w, $Stile_n){
	if ($String != '#' && $String != ',' && $String != ';'&& $String != '.'&& $String != ':'&& $String != '-'&& $String != '_'&& $String != '+'&& $String != '*'&& $String != '['&& $String != ']'&& $String != '{'&& $String != '}'&& $String != '?'&& $String != "'"&& $String != '='&& $String != ')'&& $String != '('&& $String != '/'&& $String != '&'&& $String != '€'&& $String != '%'&& $String != '$'&& $String != '£'&& $String != '"'&& $String != '!'&& $String != "@"){
		$Style = $Stile_w;}
		else{
			if ($String != '#'){
		$Style = $Stile_n;}
		else{
		$Style = $Stile_b;}
	}
	return $Style;
}


//togliere quadre vuote

Function Griglia ($String_cod, $Stile_b, $Stile_w, $Stile_n){
	for($Nc=0;$Nc<strlen($String_cod)-1;$Nc++){
	 $Arr = [];
	 $Test = $String_cod[$Nc];
	 $Arr []= $Test;
	 $Arr []=b_w_n($Test);
	  $Array [] = $Arr;
    }
 return $Array;
}

Function Split_line($String){
	for($Nc = 0; $Nc<strlen($String); $Nc++){
		$Array []=$String[$Nc];
	}
	return $Array;
}

Function Verifica_Chars($Array, $Chars){
foreach ($Chars as $c){
	foreach ($Array as $Ar => &$Let){
		if ($Array[$Ar][0]==$c){
			$Array[$Ar][1]='normal';
		}
	}
    return $Array;
}
}


?>