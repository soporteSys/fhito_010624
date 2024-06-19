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

$udni = $_GET["udina"];
$dni = $_POST["dina"];
$clave = $_POST["clave"];
$NomyApel = $_POST["NomyApel"];

//Llamamos al call y le agregamos los parametros
$sql = "call sp_logadeq(133,'$Empew','$dni','$udni','$clave','$NomyApel');";
//Si esta bien la query

$dat = $mysqli->query($sql);
$resultado = $dat->fetch_assoc();
//echo $sql;
// Verificar si $dat es un objeto de resultado válido antes de llamar a free_result

//$dat->free_result();
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
            <h1>Eliminar Usuario</h1>
            <div>
                <p>¿Desea eliminar al usuario?</p>
                <div class="w3-panel w3-red">
                    <?php echo $resultado["detay"]; ?>
                </div>
                <p>Con dni</p>
                <div class="w3-panel w3-red">
                    <?php echo $resultado["dina"] ?>
                    <input type="hidden" name="udni" value="<?php echo $resultado["udina"] ?>">
                </div>
            </div>
            <div>

            </div>
            <br>
            <button class="w3-btn w3-light-blue" type="submit" id="btnsave">Eliminar</button>
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
                    url: "eliminarusaro", // se envia a este url
                    data: $("#forma").serialize(), //Lo transformo en array
                    async: true,
                    beforeSend: function() { //Se envia la funcion
                        $("#div1").html("Procesando, espere por favor...");
                    },

                    success: function(response) { //recibe
                        $("#div1").html(response);
                        /* var respx = response.split(",");
				        var arrayA = respx[0];
				        var arrayB = respx[1];
                        $("#div1").html(arrayB);
                        if (arrayA == 280) {
                            window.close();
                        }*/

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