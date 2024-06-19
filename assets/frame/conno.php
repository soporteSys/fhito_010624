<?php
error_reporting(1);
$srv = "localhost";
$usr = "root";
$psw = "";
$mdb = "fhito2";

/*$usr="jepezaco_systemas_alf3";
	$psw="2017S@ra_ppp3";
	$mdb="jepezaco_fepaez7";*/

$mysqli = new mysqli($srv, $usr, $psw, $mdb);
$mysqli->set_charset('utf8');
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$mysqlj = new mysqli($srv, $usr, $psw, $mdb);
$mysqlj->set_charset('utf8');
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}

$mysqlk = new mysqli($srv, $usr, $psw, $mdb);
$mysqlk->set_charset('utf8');
if (mysqli_connect_errno()) {
	printf("Connect failed: %s\n", mysqli_connect_error());
	exit();
}
