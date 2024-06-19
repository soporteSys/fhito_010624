<?php
session_start();
date_default_timezone_set('America/Lima');
$fecw = date('Y-m-d');
$monw = date('Y-m');

$Empew = "";
$Raznw = "";
$Rutaw = "";

$Empew = $_SESSION['empew'];
$Raznw = $_SESSION['raznw'];
$Rutaw = $_SESSION['rutaw'];

if (empty($Empew || $Empew = '')) {
    header("location: ../.././");
} else {
    require_once('../frame/conno.php');
}


$dni = $_POST["dni"];
$udni = $_GET["udina"];
$clave = $_POST["clave"];
$NomyApel = $_POST["NomyApel"];

//Llamamos al call y le agregamos los parametros
$sql = "call sp_logadeq(133,'','', '$udni','$clave','$NomyApel');";
//Si esta bien la query

$dat = $mysqli->query($sql);
$resultado = $dat->fetch_assoc();
echo $sql;
// Verificar si $dat es un objeto de resultado válido antes de llamar a free_result

$dat->free_result();
//$mysqli->close();

?>
<!DOCTYPE html>
<html>

<head>
    <title>Fhito :: Usuarios</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../font/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/w3.css">
    <script type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
    <!-- <script type="text/javascript" src="jquery.tabletoCSV.js" charset="utf-8"></script> -->
    <script type="text/javascript" src="../js/jquery.tabletocsv.js" charset="utf-8"></script>
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
    <div class="dive fondo w3-round-normal w3-padding w3-small nomua" style="width:760px; height:auto;">
        <form method="post" class="w3-container" id="forma">
            <div>
                <label>DNI</label>
                <input class="w3-input w3-border" type="number" name="dni" id="txtdni" value="<?php echo $resultado["dina"] ?>" disabled>
            </div>
            <div>
                <label>Contraseña</label>
                <input class="w3-input w3-border" type="password" name="clave" id="txtclav" value="" placeholder="(sin cambios)">
            </div>
            <div>
                <label>Nombre y Apellidos</label>
                <input class="w3-input w3-border" type="text" name="NomyApel" id="txtNomyApel" value="<?php echo $resultado["detay"]; ?>">
            </div>
            <br>
            <div>
                <input type="hidden" name="udni" value="<?php echo $resultado["udina"]; ?>">
            </div>
            <button class="w3-btn w3-light-blue" type="submit" id="btnsave">Actualizar</button>
            <a href="usuaron.php">volver</a>
        </form>
        <div id="div1"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("#btnsave").click(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "modificarusaro", // se envia a este url
                    data: $("#forma").serialize(), //Lo transformo en array
                    async: true,
                    beforeSend: function() { //Se envia la funcion
                        $("#div1").html("Procesando, espere por favor...");
                    },

                    success: function(response) { //recibe
                        $("#div1").html(response);
                        alert(response);
                        var respx = response.split(",");
                        var arrayA = respx[0];
                        var arrayB = respx[1];
                        //alert(arrayA);
                        $("#div1").html(arrayB);
                         if (arrayA == 280) {
                             window.close();
                         }

                    },
                    error: function(e) {
                        alert('Error: ' + e);
                    }
                });
            });
        });
    </script>
</body>

</html>