<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["fritoz"])) {
        $pe = $_POST['fritoz'];
        $qe = json_decode($pe, true);
		$vpe = "";
		$vqe = "";
		$vre = "";
		$vse = "";
		$vte = "";
		$vue = "";
		$vve = "";

        $vvew = "";
		$vwew = "";
        $vxe = "";
        $vye = "";

		require_once('../frame/conno.php');
		foreach ($qe as $k => $v) {
			$vpe = $v["ppbz"];
			$vqe = $v["qqbz"];
			$vre = $v["rrbz"];
			$vse = $v["ssbz"];
			$vte = $v["ttbz"];
			$vue = $v["uubz"];
            $vve = $v["vvbz"];
		}

        $c = "CALL sp_logacap(106, '$vpe', '', '', '');";
        $d = $mysqli->query($c);
        while($r = $d->fetch_object()) {
            $vvew = $r->samba;
            $vwew = $r->sambe;
        }
        $d->free_result();
        mysqli_next_result($mysqli);

        if ($vvew != '' || $vwew != '') {
            include('../frame/connx.php');
            $aes = new ChCrytpo();
            if ($vvew != '') { $vxe = $aes->decrypt(base64_decode($vue), $vvew); }
            if ($vwew != '') { $vye = $aes->decrypt(base64_decode($vue), $vwew); }
            $vxe = ($vxe == '' ? $vye : $vxe);
 
            $vpe = $vpe.'@'.$vqe;
            $vre = $vre.'@'.$vte;
            $vue = $vxe.'@'.$vve;

            $c = "CALL sp_asasinp(103, '$vpe', '$vse', '$vre', '$vue');";
            // echo $c.'<br>';
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