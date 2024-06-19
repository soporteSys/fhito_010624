<?php
session_start();
date_default_timezone_set('America/Lima');
$fecw = date('Y-m-d');
$monw = date('Y-m');

// $Bamaw = "";
// $Bamew = "";
// $Bamiw = "";
$Empew = "";
$Raznw = "";
$Rutaw = "";

$Empew = $_SESSION['empew'];
$Raznw = $_SESSION['raznw'];
$Rutaw = $_SESSION['rutaw'];

// echo $Empew;

// if (isset($_GET['orgam'])){
//     $Orgax = $_GET['orgam'];
    //~ $iduzx = $_SESSION["iduk"];
    if (empty($Empew || $Empew = '')) {
        header("location: ../.././");
    } else {
        require_once('../frame/conno.php');
        /*$co = "CALL sp_qilobeq(131, '', '$Orgax', '', '');";
        $do = $mysqli->query($co);
        while($ro = $do->fetch_object()) {
            $Bamaw = $ro->bamba;
            $Bamew = $ro->bambe;
            $Bamiw = $ro->bambi;
        }
        $do->free_result();
        $do->close();

        if (empty($Bamaw) || $Bamaw = '' || $Bamaw <= 0) {
            $mysqli->close();
            header("location: ./");
        }*/
        
    }
// } else {
//     header("location: ./");
// }
?>
<!DOCTYPE html>
<html>
<head>
<title>Fhito :: Asistencia</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../font/css/font-awesome.min.css">
<link rel="stylesheet" href="../css/w3.css">
<script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="../js/jquery.tabletocsv.js" charset="utf-8"></script>
<script type="text/javascript" src="../js/comuny.js"></script>
<style>
@media screen and (max-width: 700px) {
    body {
        overflow: scroll;
    }
}
</style>
</head>
<body onload="javascript:getBusfila('<?php echo $fecw ?>')">
<br>
<div class="dive fondo w3-round-normal w3-padding w3-small nomua" style="width:1060px">
    <div class="w3-row w3-text-white testa">
        <div class="w3-col s2 testo">
            <a href="../../panadm?orgam=<?php echo $Rutaw ?>" class=""><i class="fa fa-arrow-circle-left w3-xxlarge w3-text-white"></i></a>
        </div>
		<div class="w3-col s8 w3-center w3-mediom testa">REPORTE DE ASISTENCIA</div>
        <div class="w3-col s2 testo w3-right-align">
            <a href="javascript:void(0);" onclick="location.reload(true);"><i class="fa fa-refresh w3-mediem w3-text-white"></i></a>
        </div>
	</div>
    <br>
    <div class="w3-row w3-norman w3-text-white">
        <div class="w3-col s4 w3-left-align teste"><?php echo $Empew ?></div>
        <div class="w3-col s4">&nbsp;</div>
        <div class="w3-col s4 w3-right-align teste"><?php echo $Raznw ?></div>
	</div>
	<hr class="new4">
    <div class="w3-row testu">
        <div class="w3-col s2">
            <input class="w3-input" type="month" id="txtFec" name="txtFec" placeholder="FECHA" value="<?php echo $monw ?>" maxlength="10" autofocus onchange="javascript:getBusfila(txtFec.value)" style="width:150px;">
        </div>
        <div class="w3-col s8">&nbsp;</div>
        <div class="w3-col s1 w3-right-align">
            <a href="javascript:void(0);" onclick="window.print();" title="Imprimir">
                <i class="fa fa-print w3-xlarge w3-text-white"></i>
            </a>
        </div>
        <div class="w3-col s1 w3-right-align">
            <a id="export" href="javascript:void(0);" data-export="export" title="Exportar a Excel">
                <i class="fa fa-file-excel-o w3-xlarge w3-text-white"></i>
            </a>
        </div>
	</div>
    <br>

    <div id="div1" name="div1" class="w3-text-black">&nbsp;</div>
    <br>
</div>

<script>
function getBusfila(cad1) {
	$.ajax({
		type: "POST",
		url: "asistena",
		data: "camara="+cad1,
		async: false,
		success: function(response) {
			if (response != ""){
				$("#div1").html("");
				$("#div1").html(response);
			}
		},
		error: function (request,status,error) {
			alert(request.responseText);
		}
	});
}

$("#export").click(function(){
    var options = {
        seperator: ',',
        fileName: 'asistencia',
        extension: 'csv',
        outputheaders: false
    }
    $("#extable").tableToCsv(options);
});
</script>
</body>
</html>
<?php $mysqli->close(); ?>
