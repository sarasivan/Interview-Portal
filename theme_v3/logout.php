<?php
session_start(); 
date_default_timezone_set("Asia/Kolkata");
include 'db_connection/connection.php';
include 'db_connection/db.php';
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

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
 $employee_id=$_SESSION['employee_id'];
 $login_out = date("Y-m-d H:i:s");
 $query = "SELECT id FROM user_log WHERE emp_id = ? ORDER BY id DESC LIMIT 1";
 $stmt = $connnect->prepare($query);
 $stmt->bind_param("s", $employee_id);
 $stmt->execute();
 $result = $stmt->get_result();
 
 if ($result->num_rows > 0) {
     $column = $result->fetch_array();
     $id = $column['id'];
 
     $sqlinsert = "UPDATE user_log SET logout = ?, status = 'INACTIVE' WHERE emp_id = ? AND id = ?";
     $stmt_update = $connnect->prepare($sqlinsert);
     $stmt_update->bind_param("ssi", $login_out, $employee_id, $id);
 
     if ($stmt_update->execute()) {
         echo json_encode(['status' => 'success', 'message' => 'Data updated successfully']);
         // Redirect to login page
         header("Location: login.php");
         exit();
     } else {
         echo json_encode(['status' => 'error', 'message' => $stmt_update->error]);
         exit();
     }
 } else {
     echo json_encode(['status' => 'error', 'message' => 'No matching record found']);
     exit();
 }
 
 // Close the statement and connection
 $stmt->close();
 $connnect->close();
 
 


?>