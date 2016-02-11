<?php

require("vendor/autoload.php");

if (!file_exists('reports')) {
    mkdir('reports');
}

$json = file_get_contents('php://input');
if ($json === false) {
    throw new Exception('Bad Request');
}

$csp = json_decode($json, true);
if (is_null($csp)) {
    throw new Exception('Bad JSON Violation');
}

$csp['date'] = time();

$data = json_decode($csp);

file_put_contents(sprintf("reports/%s.json",$csp['date']),$data);

echo "Thanks for your report!";