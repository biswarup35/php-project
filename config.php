<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "the_teachers";
// create connection
$conn = new mysqli($servername,$username,$password, $database);

// check connection
if ($conn) {

} elseif($conn->connect_error) {
    die("Connection failed: ".$conn->connect_error);
}

?>