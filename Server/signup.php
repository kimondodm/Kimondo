<?php

require "function.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$bname = $_POST['bname'];
	$openingh = $_POST['openingh'];
	$closingh = $_POST['closingh'];
	$bphone = $_POST['bphone'];
	create_seller($bname, $opening_h, $closing_h, $bphone);
	//echo $bname." ".$openingh." ".$closingh." ".$bphone;

	$latest_id = get_latest_id() + 1;
	$tmp = $_FILES['bimage']['tmp_name'];
	$name = $_FILES['bimage']['name'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	$folder = "../Resources/". $latest_id. "." .$ext;
	move_uploaded_file($tmp, $folder);
}

header("Location: ../App/index.htm");