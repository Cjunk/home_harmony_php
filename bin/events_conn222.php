<?php
function getDatabaseConnection()
{   
    // ini_set('display_errors', 1);
    // error_reporting(E_ALL);
    $servername = "118.139.179.166";  // or your server IP/hostname
    $username = "jericho";
    $password = "Quest35#";
    $dbname = "home_harmony";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    return $conn;
}
 $conn = getDatabaseConnection();
function greet($name)
{
    echo "Hello, " . $name . "!";
}

