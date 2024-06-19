<?php
session_start();
//ruc
$Empew = $_SESSION['empew'];
$Raznw = $_SESSION['raznw'];
$Rutaw = $_SESSION['rutaw'];

include '../frame/conno.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Txrvalor = json_encode($_POST, JSON_UNESCAPED_UNICODE);
    //Envio el json con el ruc
    $sql = "CALL sp_logadeq(134, '' , '$Txrvalor', '', '','');";


    echo $sql . '<br>';

     $dat = $mysqli->query($sql);

    // //TRAE 280 y usuario

    while ($row = $dat->fetch_object()) {
         $Valuar = $row->prime;
         $Confar = $row->primo;
     }
     $dat->free_result();
     $dat->close();
     $mysqli->close();

    // echo $Valuar . ',' . $Confar;
}
