<?php

if (!defined("const")) {
  die();
}

$env = parse_ini_file('.env');

$dbhost = $env["DB_HOST"];
$dbname = $env["DB_NAME"];
$dbuser = $env["DB_USER"];
$dbpassword = $env["DB_PASSWORD"];

$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpassword);
