<?php

require "function.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

if($_SERVER['REQUEST_METHOD'] == "POST") {
	$bname = $_POST['bname'];
	$opening_h = $_POST['openingh'];
	$closing_h = $_POST['closingh'];
	$bphone = $_POST['bphone'];

	$latest_id = get_latest_id() + 1;
	$tmp = $_FILES['bimage']['tmp_name'];
	$name = $_FILES['bimage']['name'];
	$ext = pathinfo($name, PATHINFO_EXTENSION);
	$imgname = $latest_id. "." .$ext;
	$folder = "../Resources/". $imgname;
	move_uploaded_file($tmp, $folder);

	create_seller($bname, $opening_h, $closing_h, $bphone, $imgname);

}

header("Location: ../App/index.htm");