<?php
session_start();
// date_default_timezone_set('America/Lima');
// $fecw = date('Y-m-d');
// ini_set('display_errors', 1);
$Empew = $_SESSION['empew'];
$Raznw = $_SESSION['raznw'];
// $Rutaw = $_SESSION['rutaw'];

include '../frame/conno.php';
// require_once('../frame/conno.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Camara = $_POST['camara'];
?>

    <table id="extable" class="w3-table-all">
        <thead>
            <tr class="w3-light-grey">
                <th>PLACA</th>
                <th>VALOR</th>
                <th>OBS.</th>
                <th>FECHA</th>
                <th>DNI</th>
                <th>NOMBRES</th>
                <th class="testu">...</th>
            </tr>
        </thead>
        <?php
        $sql = "CALL sp_qilobeq(103, '$Empew', '$Camara', '11', '');";
        $dat = $mysqli->query($sql);
        while ($row = $dat->fetch_object()) {
        ?>
            <tr>
                <td><?php echo $row->bamba ?></td>
                <td><?php echo $row->bambe ?></td>
                <td><?php echo $row->bambi ?></td>
                <td><?php echo $row->bambo ?></td>
                <td><?php echo $row->bambu ?></td>
                <td><?php echo $row->gamba ?></td>
                <td class="testu">
                    <a class="testu" href="javascript:void(0);" onclick="getBusMnto('<?php echo $row->bamba ?>','<?php echo $row->bambe ?>','<?php echo $row->bambi ?>','<?php echo $row->bambu ?>','<?php echo $row->gamba ?>','<?php echo $row->gambe ?>');">
                        <i class="fa fa-image w3-mediom w3-text-red"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
        //variable almacenada
        // $dat->free_result();
        $dat->close();
        $mysqli->close();
        ?>
    </table>

<?php
}
?>