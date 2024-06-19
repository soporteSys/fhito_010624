<?php
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
date_default_timezone_set('America/Lima');
// $fecw = date('Y-m-d');
$Empew = $_SESSION['empew'];
$Raznw = $_SESSION['raznw'];
$Camar = '';
$Camer = '';

 if (empty($Empew || $Empew = '')) {
    header("location: ../.././");
} else {
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if (isset($_GET['camar']) && isset($_GET['camer'])){
            $Camar = $_GET['camar'];
            $Camer = $_GET['camer'].'-01';
 
            include '../../assets/frame/conno.php';
            $fil = array();
            $sql = "CALL sp_qilobeq(105, '$Empew', '$Camer', '$Camar', '');";
            // echo $sql;
            $dat = $mysqli->query($sql);
            while ($row = $dat->fetch_object()) {
                if (file_exists($row->bamba)) {
                    array_push($fil, $row->bamba);
                }
            }
            $dat->free_result();
            $dat->close();
            $mysqli->close();

            $fis = $fil;
            $zip = new ZipArchive();
            $tmp = tempnam('.','');
            $res = $zip->open($tmp, ZipArchive::CREATE);
            if($res){
                foreach ($fis as $file) {
                    $dow = file_get_contents($file);
                    $zip->addFromString(basename($file), $dow);
                }
                $zip->close();
            } else {
                echo "Error creando el archivo zip: " . $res;
            }

            header("Pragma: public");
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-type: application/octet-stream");
            header("Content-Disposition: attachment; filename=\"".$Empew.".zip\"");
            header("Content-Transfer-Encoding: binary");
            header("Content-Length: ".filesize($tmp));
            ob_end_flush();
            ob_clean();
            flush();
            @readfile($tmp);
            unlink($tmp);
            exit;
        }
    }
}
