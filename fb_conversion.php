<?php

ini_set("max_execution_time", "1700");
set_time_limit(1700);
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST");
header("Content-Type: application/json; charset=utf-8");
http_response_code(200);

//********************************

if (array_key_exists("timezone", $_GET)) {
  date_default_timezone_set($_GET["timezone"]);
  $result["unixtime"] = time();
} else {
  $result["unixtime"] = time();
}

if (array_key_exists("phone", $_GET)) {
  $result["fbPhone"] = hash("sha256", $_GET["phone"]);
}

if (array_key_exists("email", $_GET)) {
  $result["fbEmail"] = hash("sha256", $_GET["email"]);
}

$result = json_encode($result, JSON_UNESCAPED_UNICODE);
