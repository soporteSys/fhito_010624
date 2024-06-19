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
    <div class="dive fondo w3-round-normal w3-padding w3-small nomua" style="width:760px">
        <div class="w3-row w3-text-white testa">
            <div class="w3-col s2 testo">
                <a href="../../panadm?orgam=<?php echo $Rutaw ?>" class=""><i class="fa fa-arrow-circle-left w3-xxlarge w3-text-white"></i></a>
            </div>
            <div class="w3-col s8 w3-center w3-mediom testa">REPORTE DE USUARIOS</div>
            <div class="w3-col s2 testo w3-right-align">
                <a href="javascript:void(0);" onclick="location.reload(true);"><i class="fa fa-refresh w3-mediem w3-text-white"></i></a>
            </div>
        </div>
        <div id="id01" class="w3-modal w3-text-black">&nbsp;</div>
        <br>
        <div class="w3-row w3-norman testa w3-text-white">
            <div class="w3-col s4 w3-left-align teste"><?php echo $Empew ?></div>
            <div class="w3-col s4">&nbsp;</div>
            <div class="w3-col s4 w3-right-align teste"><?php echo $Raznw ?></div>
        </div>
        <hr class="new4">
        <div class="w3-row testu">
            <div class="w3-col s2">&nbsp;
                <!-- <input class="w3-input" type="month" id="txtFec" name="txtFec" placeholder="FECHA" value="<?php //echo $monw 
                                                                                                                ?>" maxlength="10" autofocus onchange="javascript:getBusfila(txtFec.value)" style="width:150px;"> -->
            </div>
            <div class="w3-col s7">&nbsp;</div>
            <!-- Agregar usuario-->
            <div class="w3-col s1 w3-right-align">
                <a href="agregarusaron.php" title="Agregar">
                    <i class="fa fa-plus w3-xlarge w3-text-white"></i>
                </a>
            </div>
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

        <table id="extable" class="w3-table-all">
            <thead>
                <tr class="w3-light-grey">
                    <th>DNI</th>
                    <th>NOMBRES</th>
                    <th>CLAVE</th>
                    <th>ACT</th>
                </tr>
            </thead>
            <?php
            $sql = "CALL sp_logadeq(131, '$Empew', '', '', '', '');";
            $dat = $mysqli->query($sql);
            while ($row = $dat->fetch_object()) {
            ?>
                <tr>
                    <td><?php echo $row->bamba ?></td>
                    <td><?php echo $row->bambe ?></td>
                    <td><?php echo $row->bambi ?></td>
                    <td><?php echo $row->bambo ?></td>
                    <td><a href="modificarusaron.php?udina=<?= $row->bambu ?>"><i class="fa fa-pencil w3-xlarge w3-text-black"></i></a>
                        <a href="elimiusaron.php?udina=<?= $row->bambu ?>"><i class="fa fa-trash w3-xlarge w3-text-black"></i></a>
                    </td>
                </tr>
            <?php
            }
            $dat->free_result();
            $dat->close();
            // $mysqli->close();
            ?>
        </table>
        <br>
    </div>

    <script>
        function getBusfila(cad1) {
            $.ajax({
                type: "POST",
                url: "combusna",
                data: "camara=" + cad1,
                async: false,
                success: function(response) {
                    if (response != "") {
                        $("#div1").html("");
                        $("#div1").html(response);
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }

        function getBusMnto(cad1, cad2, cad3, cad4, cad5, cap1) {
            // alert(cad1);
            document.getElementById('id01').style.display = 'block';
            $.ajax({
                type: "POST",
                url: "combusne",
                data: "amar=" + cad1 + "&amer=" + cad2 + "&amir=" + cad3 + "&amor=" + cad4 + "&amur=" + cad5 + "&apar=" + cap1,
                async: false,
                success: function(response) {
                    if (response != "") {
                        $("#id01").html("");
                        $("#id01").html(response);
                    }
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                    document.getElementById('id01').style.display = 'none';
                }
            });
        }

        $("#export").click(function() {
            var options = {
                seperator: ',',
                fileName: 'usuarios',
                extension: 'csv',
                outputheaders: false
            }
            $("#extable").tableToCsv(options);
        });
    </script>
</body>

</html>
<?php $mysqli->close(); ?>