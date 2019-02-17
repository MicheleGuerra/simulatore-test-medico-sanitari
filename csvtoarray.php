<?php

session_start();
mb_internal_encoding('UTF-8');

$con = mysqli_connect('localhost','root', 'password');
if($con){
    echo"connection";
}

mysqli_select_db($con,'quizdbase');

function csvToArray($filepath){
    //setlocale(LC_ALL, 'UTF-8');
    // apertura del file
    if (($handle = fopen($filepath, "r")) !== FALSE) {
        $nn = 0;
        // legge una riga alla volta fino alla fine del file
        while (($data = fgetcsv($handle, 1000, "#")) !== FALSE) {
            // numero di elementi presenti nella riga letta
            $num_elementi = count($data);
            // popolamento dell'array
            for ($x=0; $x<$num_elementi; $x++) {
                $csvarray[$nn][$x] = $data[$x];
            }
            $nn++;
        }
        // Chiusura del file
        fclose($handle);
    } else {
        echo "File non trovato";
    }

    return $csvarray;
}

$array_csv = csvToArray('simulazione1csv.csv');
foreach($array_csv as $numero_riga => $valori){
    $valore_prima_colonna = $valori[0];
    /*$valore_seconda_colonna = $valori[1];
    $valore_terza_colonna = $valori[2];
    $valore_quarta_colonna = $valori[3];
    $valore_quinta_colonna = $valori[4];
    $valore_sesta_colonna = $valori[5];
    $valore_settima_colonna = $valori[6];*/

	
	$query = " insert into questions(question) values ('$valore_prima_colonna')";
$result = mysqli_query($con,$query) ;
    //echo 'riga: '.$numero_riga.' - valori: '.$valore_prima_colonna.' # '.$valore_seconda_colonna. ' # '.$valore_terza_colonna.' # '.$valore_quarta_colonna;
}




?>