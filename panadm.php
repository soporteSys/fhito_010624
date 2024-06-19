<?php
session_start();
$Bamaw = "";
$Bamew = "";
$Bamiw = "";

if (isset($_GET['orgam'])) {
    $Orgax = $_GET['orgam'];
    if (empty($Orgax)) {
        header("location: ./");
    } else {
        require_once('assets/frame/conno.php');
        $co = "CALL sp_logacaq(131, '', '$Orgax', '', '');";
        echo $co;
        $do = $mysqli->query($co);
        while ($ro = $do->fetch_object()) {
            $Bamaw = $ro->bamba;
            $Bamew = $ro->bambe;
            $Bamiw = $ro->bambi;
            $_SESSION['empew'] = $Bamew;
            $_SESSION['raznw'] = $Bamiw;
            $_SESSION['rutaw'] = $Orgax;
        }
        // $do->free_result();
        $do->close();

        if (empty($Bamaw) || $Bamaw = '' || $Bamaw <= 0) {
            $mysqli->close();
            header("location: ./");
        }
    }
} else {
    header("location: ./");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Fhito :: Panel</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/font/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/w3.css">
    <script type="text/javascript" src="assets/js/jquery-3.6.0.min.js"></script>
    <style>
    </style>
</head>

<body class="w3-text-white">
    <br>
    <div class="w3-content dive fondo w3-round-normal w3-padding" style="max-width:320px">
        <p class="w3-center w3-mediom">PANEL<?php echo '<br>' . $Bamew . '<br>' . $Bamiw ?></p>
        <!-- <div class="w3-row">
        <div class="w3-col s1">&nbsp;</div>
		<div class="w3-col s11"><h4>ADMINISTRACION</h4></div>
	</div> -->
        <hr class="new4">

        <div class="w3-row dive w3-text-white w3-small" style="max-width:260px">
            <a href="assets/panel/asisten">
                <div class="w3-col s5 w3-center w3-border w3-round-normal"><br>
                    <img class="w3-image" src="assets/figs/graf1.png" style="width:50%"><br>
                    <p>ASISTENCIA</p>
                </div>
            </a>
            <div class="w3-col s2 w3-center"><br></div>
            <a href="assets/panel/kilomen">
                <div class="w3-col s5 w3-center w3-border w3-round-normal"><br>
                    <img class="w3-image" src="assets/figs/graf2.png" style="width:50%"><br>
                    <p>KILOMETRAJE</p>
                </div>
            </a>
        </div><br>
        <div class="w3-row dive w3-text-white w3-small" style="max-width:260px">
            <a href="assets/panel/combusn">
                <div class="w3-col s5 w3-center w3-border w3-round-normal"><br>
                    <img class="w3-image" src="assets/figs/graf3.png" style="width:50%"><br>
                    <p>COMBUSTIBLE</p>
                </div>
            </a>
            <div class="w3-col s2 w3-center"><br></div>
            <a href="assets/panel/usuaron">
                <div class="w3-col s5 w3-center w3-border w3-round-normal"><br>
                    <img class="w3-image" src="assets/figs/graf6.png" style="width:50%"><br>
                    <p>USUARIOS</p>
                </div>
            </a>
        </div>
        <br>
    </div>
    <br>
</body>

</html>
<?php $mysqli->close(); ?>