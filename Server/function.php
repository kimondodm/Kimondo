<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require "config.php";

$conn = new mysqli(Config::SERVER_NAME, Config::USER_NAME, Config::PASSWORD, Config::DB_NAME);

function create_seller($bname, $opening_h, $closing_h, $bphone) {

    global $conn;
    $stmt = $conn->prepare("INSERT INTO seller(business_name, opening_hours, closing_hours, business_phone) VALUES(?,?,?,?)");
    $stmt->bind_param("ssss", $bname, $opening_h, $closing_h, $bphone);
    $stmt->execute();
    $stmt->close();

}

function get_sellers() {

    global $conn;
    $stmt = $conn->prepare("SELECT * FROM seller");
    $stmt->execute();
    $result = $stmt->get_result();
    $res = $result->fetch_all(MYSQLI_ASSOC);
    return($res);

}

function get_latest_id() {

    global $conn;
    $stmt = $conn->prepare("SELECT MAX(seller_id) FROM seller");
    $stmt->execute();
    $stmt->bind_result($result);
    $stmt->fetch();
    return($result);

}

//create_seller("wab","0","2","+245716");

//$al = get_sellers();
//get_sellers();
//print_r($al);
// /echo get_latest_id();