<?php

$servername =  "localhost";
$dbusername =  "pqadmin";
$dbpassword = "Pr3W3b@25";
$database = "hrms";
$conn = new PDO("mysql:host=$servername;dbname=$database", $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>