<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["fritoz"])) {
        $pe = $_POST['fritoz'];
        $qe = json_decode($pe, true);
		$vpe = "";
		$vqe = "";
		$vve = "";
		$vwe = "";
		$vxe = "";
		$vye = "";

		require_once('../frame/conno.php');
		foreach ($qe as $k => $v) {
			$vpe = $v["ppbz"];
			$vqe = $v["qqbz"];
			$vre = $v["rrkz"];
		}

        $c = "CALL sp_logacap(102, '$vpe', '', '', '');";
        $d = $mysqli->query($c);
        while($r = $d->fetch_object()) {
            $vve = $r->samba;
            $vwe = $r->sambe;
        }
        $d->free_result();
        mysqli_next_result($mysqli);

        if ($vve != '' || $vwe != '') {
            include('../frame/connx.php');
            $aes = new ChCrytpo();
            if ($vve != '') { $vxe = $aes->decrypt(base64_decode($vqe), $vve); }
            if ($vwe != '') { $vye = $aes->decrypt(base64_decode($vqe), $vwe); }
            $vxe = ($vxe == '' ? $vye : $vxe);

            $c = "CALL sp_logacap(104, '$vxe', '', '', '');";
            $r = array();
            $d = $mysqli->query($c);
            while($s = mysqli_fetch_assoc($d)){
                $r[] = $s;
            }
            $d->free_result();
            echo str_replace("]","",str_replace("[","",json_encode($r, JSON_UNESCAPED_UNICODE)));
        }
        $d->close();
        $mysqli->close();
	}
}