<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST["fritoz"])) {
        // $pe = '[{"ppbz":"e3506e261b7c8e6469ee56dae37e4ed8","qqbz":"\/\/\/"}]';
        $pe = $_POST['fritoz'];
        $qe = json_decode($pe, true);
		$vpe = "";
		$vqe = "";

		require_once('../frame/conno.php');
		foreach ($qe as $k => $v) {
			$vpe = $v["ppbz"];
			$vqe = $v["qqbz"];
		}

        $c = "CALL sp_logacap(108, '$vpe', '', '', '');";
        // echo $c.'<br>';
        $d = $mysqli->query($c);
        $r = array();
        while($s = mysqli_fetch_assoc($d)){
            $r[] = $s;
        }
        $d->free_result();
        $d->close();
        $mysqli->close();
        // echo str_replace("]","",str_replace("[","",json_encode($r, JSON_UNESCAPED_UNICODE)));

        $t['data'] = $r;
        echo json_encode($t, JSON_UNESCAPED_UNICODE);

	}
}