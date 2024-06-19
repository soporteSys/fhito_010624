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
                <th>DNI</th>
                <th>NOMBRES</th>
                <th>FECHA</th>
                <th>T</th>
                <th>POSICIÓN</th>
                <th>DIRECCIÓN</th>
                <th>OBS.</th>
                <th>...</th>
            </tr>
        </thead>
        <?php
        $sql = "CALL sp_asasinq(104, '$Empew', '$Camara', '', '');";
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
                <td><?php echo $row->gambe ?></td>
                <td class="testu">
                    <a class="testu" href="javascript:void(0);" onclick="iabren('<?php echo $row->gambi ?>');">
                        <i class="fa fa-map-marker w3-xlarge w3-text-red"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
        //$dat->free_result();
        $dat->close();
        $mysqli->close();
        ?>
    </table>

<?php
}
?>