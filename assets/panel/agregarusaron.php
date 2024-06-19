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
$clave = $_POST["clave"];
$NomyApel = $_POST["NomyApel"];

//Llamamos al call y le agregamos los parametros
$sql = "call sp_logadeq(132,'','$dni', '','$clave','$NomyApel');";
//Si esta bien la query
echo $sql;
$dat = $mysqli->query($sql);
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
            <div>
                <label>DNI</label>
                <input class="w3-input w3-border" type="number" name="dni" id="txtdni">
            </div>
            <div>
                <label>Contraseña</label>
                <input class="w3-input w3-border" type="password" name="clave" id="txtclav">
            </div>
            <div>
                <label>Nombre y Apellidos</label>
                <input class="w3-input w3-border" type="text" name="NomyApel" id="txtNomyApel">
            </div>
            <br>
            <button class="w3-btn w3-light-blue" type="submit" id="btnsave">Registrar</button>
            <a href="usuaron.php">volver</a>
        </form>
        <div id="div1"></div>
    </div>

    <script>
        $(document).ready(function() {
            $("#btnsave").click(function(e) {
                e.preventDefault();

                $("#div1").html("");
                if ($.trim($('#txtdni').val()) == "") {
                    $("#div1").html("Escriba su dni");
                    $('#txtdni').focus();
                    return false;
                }
                if ($.trim($('#txtclav').val()) == "") {
                    $("#div1").html("Escriba su clave");
                    $('#txtclav').focus();
                    return false;
                }
                if ($.trim($('#txtNomyApel').val()) == "") {
                    $("#div1").html("Escriba su Nombre y Apellido");
                    $('#txtNomyApel').focus();
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: "usaro", // se envia a este url
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