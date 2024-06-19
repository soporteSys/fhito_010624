<?php
define("UPLOAD_PATH", "/demo/images/");

// if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$target_dir = "images/";
	$filepath = $target_dir.basename($_FILES['pic']['name']);
	$par = $_FILES['pic']['name'];
	$response = array();

	$fin = finales(substr($par,0,strpos($par,".")));

	if (substr($fin,0,1) == 0) {
		if(isset($_GET['orgam'])) {
			switch($_GET['orgam']) {
			case 'meqam':
				if(isset($_FILES['pic']['name'])  ) {
					try {
						move_uploaded_file($_FILES['pic']['tmp_name'], $filepath);
						$response['error'] = false;
						$response['message'] = UPLOAD_PATH.$_FILES['pic']['name'];
					} catch(Exception $e) {
						$response['error'] = true;
						$response['message'] = 'Could not upload file';
					}
				} else {
					$response['error'] = true;
					$response['message'] = "Required params not available";
				}
			}
			echo substr($fin,2);
		}
	}

	if (substr($fin,0,1) == 1) {
		echo substr($fin,4);
	}

	function finales($cad) {
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$pe = $_POST['fritoz'];
		$qe = json_decode($pe, true);
		$vpe = "";
		$vqe = "";
		$vqq = "";
		require_once('../assets/frame/conno.php');
		foreach ($qe as $k => $v) {
			$vpe = $v["ppbz"];
			$vqe = $v["qqbz"];
			$vqq = substr($vqe,0,strpos($vqe,"."));	
		}
		$r = array();
		$m = 0;

		$c = "CALL sp_qilobep(124, '$vpe', '$vqq', '', '');";
		// echo $c.'<br>';
		$d = $mysqli->query($c);
		while($s = mysqli_fetch_assoc($d)){
			$r[] = $s;
			$m = $s['sambe'];
		}
		$d->free_result();
		$d->close();
		$mysqli->close();
		$n = str_replace("]","",str_replace("[","",json_encode($r, JSON_UNESCAPED_UNICODE)));
	
		return $m.'@'.$n;
		}
	}
// }