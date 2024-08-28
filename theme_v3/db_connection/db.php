
<?php
//my sql connection code  
$servername = "localhost";
$username = "pqadmin";
$password = "Pr3W3b@25";
$dbname = "hrms";
$connnect = new mysqli($servername, $username, $password, $dbname);
if ($connnect->connect_error) {
  die("Connection failed: " . $connnect->connect_error);
} 
else{

}

?>