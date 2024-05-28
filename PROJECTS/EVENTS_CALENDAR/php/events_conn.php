<?php
function getDatabaseConnection()
{
    $servername = "118.139.179.166";  // or your server IP/hostname
    $username = "jericho";
    $password = "Quest35#";
    $dbname = "scheduler";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function greet($name)
{
    echo "Hello, " . $name . "!";
}
