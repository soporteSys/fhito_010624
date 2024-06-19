<?php
session_start();
// ini_set('display_errors', 1);
$Empew = $_SESSION['empew'];
$Raznw = $_SESSION['raznw'];
include '../frame/conno.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['amar'])) { $Amar = trim($_POST['amar']); }
    if (isset($_POST['amer'])) { $Amer = trim($_POST['amer']); }
    if (isset($_POST['amir'])) { $Amir = trim($_POST['amir']); }
    if (isset($_POST['amor'])) { $Amor = trim($_POST['amor']); }
    if (isset($_POST['amur'])) { $Amur = trim($_POST['amur']); }
    if (isset($_POST['apar'])) { $Apar = trim($_POST['apar']).'.jpg'; }
    if (isset($_POST['aper'])) { $Aper = trim($_POST['aper']); }

    // echo $Amar.'<br>';
    // echo $Amer.'<br>';
    // echo $Amir.'<br>';
    // echo $Amor.'<br>';
    // echo $Amur.'<br>';
    // echo 'Apar - '.$Apar.'<br>';
    // echo 'Aper - '.$Aper.'<br>';
?>

<div class="w3-modal-content w3-card-4 w3-round">
    <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright w3-red w3-round"><i class="fa fa-close w3-large"></i></span>
    <br><br>
    <div class="w3-container w3-normen w3-center">
        <div class="w3-row">
            <div class="w3-col s3 w3-left-align"><?php echo $Amar ?></div>
            <div class="w3-col s9 w3-left-align"><?php echo $Amer ?></div>
    	</div>
        <div class="w3-row">
            <div class="w3-col s12 w3-left-align"><?php echo $Amir ?></div>
    	</div>
        <div class="w3-row">
            <div class="w3-col s3 w3-left-align"><?php echo $Amor ?></div>
            <div class="w3-col s9 w3-left-align"><?php echo $Amur ?></div>
    	</div>
        <br>
        <img src="../../demo/images/<?php echo $Apar ?>" alt="" class="w3-image"><br>
    </div>
    <br>
</div>
<?php 
}
?>