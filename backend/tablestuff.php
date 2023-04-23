<?php

$servername = getenv("DB_HOST") ? getenv("DB_HOST") : "localhost"; // REPLACE with Database host, usually localhost

if (getenv("DB_HOST")) {
    $servername = getenv("DB_HOST");
    $dbname = "research";
    $dbuser = "research";
} else {
    $servername = "localhost";
    $dbname = "colli11s_research";
    $dbuser = "colli11s_research";
}

$dbpass = "secret123";

// Create connection
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);

// Check connection
if ($conn->connect_error) {
    $response = array(
        "error" => "Connection refused"
    );
    echo json_encode($response);
    return;
}



?>
