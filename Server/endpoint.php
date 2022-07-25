<?php

header('Access-Control-Allow-Origin: *');

require "function.php";

$arr = get_sellers();
echo (json_encode($arr));

?>