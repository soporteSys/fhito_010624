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
        $vqe = $vqe.'@'.$vre;
        $vre = $vse.'@'.$vue;
        $vse = $vte.'@'.$vve;

        $c = "CALL sp_qilobep(122, '$vpe', '$vqe', '$vre', '$vse');";
        // echo $c.'<br>';
        $d = $mysqli->query($c);
        $r = array();
        while($s = mysqli_fetch_assoc($d)){
            $r[] = $s;
        }
        $d->free_result();
        $d->close();
        $mysqli->close();
        echo str_replace("]","",str_replace("[","",json_encode($r, JSON_UNESCAPED_UNICODE)));
	}
}