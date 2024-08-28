<?php
include '../db_connection/connection.php';
include '../db_connection/db.php';
session_start();

$action = $_GET['action'];

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($action == 'showuserdata'){

    $division='HUMAN RESOURCE';

    $sqldata="SELECT `id`, `employee_id`, `username`, `email`, `password`, `role`,`division`, `user_img`, `status` FROM `users` WHERE `division`='$division'";
    $sqlprocessfilter = mysqli_query($connnect, $sqldata);

    if (!$sqlprocessfilter) {
        echo "Error: " . mysqli_error($connnect);
        exit;
    }

    $results = [];
    while ($row = mysqli_fetch_assoc($sqlprocessfilter)) {
        $results[] = $row;
    }
    echo json_encode($results);
}

else if ($action == 'updateuserdata') {
    if (isset($_POST['row_id']) && isset($_POST['employee_id'])) {
        $row_id = mysqli_real_escape_string($connnect, $_POST['row_id']);
        $employee_id = mysqli_real_escape_string($connnect, $_POST['employee_id']);
        $employeename = mysqli_real_escape_string($connnect, $_POST['employeename']);
        $employeeemail = mysqli_real_escape_string($connnect, $_POST['employeeemail']);
        $employeepassowrd = mysqli_real_escape_string($connnect, $_POST['employeepassowrd']);
        $employeerole = mysqli_real_escape_string($connnect, $_POST['employeerole']);
        $employeedivsion = mysqli_real_escape_string($connnect, $_POST['employeedivsion']);
        $employeestatus = mysqli_real_escape_string($connnect, $_POST['employeestatus']);

         $query = "UPDATE `users` SET `username`='$employeename',`email`='$employeeemail',`password`='$employeepassowrd',`role`='$employeerole',`division`='$employeedivsion',`status`='$employeestatus' WHERE  `id`='$row_id' AND `employee_id`='$employee_id'";

        if (mysqli_query($connnect, $query)) {
            echo json_encode(['status' => 'success', 'message' => 'User updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
}

else if ($action == 'createnewuser') {
    if (isset($_POST['employee_id']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['role']) && isset($_POST['division']) && isset($_POST['status'])) {

        $employee_id = mysqli_real_escape_string($connnect, $_POST['employee_id']);
        $username = mysqli_real_escape_string($connnect, $_POST['username']);
        $email = mysqli_real_escape_string($connnect, $_POST['email']);
        $password = mysqli_real_escape_string($connnect, $_POST['password']);
        $role = mysqli_real_escape_string($connnect, $_POST['role']);
        $division = mysqli_real_escape_string($connnect, $_POST['division']);
        $status = mysqli_real_escape_string($connnect, $_POST['status']);

        $created_by = $_SESSION['employee_name'];
        $created_at = date("Y-m-d H:i:s");
        $created_ip = $_SERVER['REMOTE_ADDR'];

        $query = "INSERT INTO `users` (`employee_id`, `username`, `email`, `password`, `role`, `division`, `status`, `created_by`, `created_at`, `created_ip`) 
                  VALUES ('$employee_id', '$username', '$email', '$password', '$role', '$division', '$status', '$created_by', '$created_at', '$created_ip')";

        if (mysqli_query($connnect, $query)) {
            echo json_encode(['status' => 'success', 'message' => 'User created successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
}
?>
