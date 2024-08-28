<?php 

session_start();
date_default_timezone_set("Asia/Kolkata");

include '../db_connection/connection.php';
include '../db_connection/db.php';

$action = $_GET['action'];

if ($action == 'Get_login_value') {
    login_details($connnect);
}

function login_details($connnect) {
    if (isset($_POST['employee_id']) && isset($_POST['password'])) {
        $employeeid = $connnect->real_escape_string($_POST['employee_id']);
        $password = $connnect->real_escape_string($_POST['password']);

        // Check if there's an active session for this employee
        $session_check_query = "SELECT * FROM user_log WHERE emp_id=? AND status='ACTIVE' AND logout IS NULL";
        $stmt = $connnect->prepare($session_check_query);
        $stmt->bind_param('s', $employeeid);
        $stmt->execute();
        $session_check_result = $stmt->get_result();

        if ($session_check_result->num_rows > 0) {
            echo json_encode(['status' => 'error', 'message' => 'You are already logged in on another system']);
            exit;
        }

        // Check if the user exists and password is correct
        $query = "SELECT * FROM users WHERE employee_id=? AND password=? AND status='ACTIVE'";
        $stmt = $connnect->prepare($query);
        $stmt->bind_param('ss', $employeeid, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $column = $result->fetch_assoc();

            $employee_name = $column['username'];
            $role = $column['role'];
            $status = $column['status'];
            $employee_id = $column['employee_id'];
            $email = $column['email'];

            // Store session values
            $_SESSION['employee_name'] = $employee_name;
            $_SESSION['role'] = $role;
            $_SESSION['status'] = $status;
            $_SESSION['employee_id'] = $employee_id;
            $_SESSION['email'] = $email;
            $_SESSION['login'] = 1;

            // Log the login time
            $login_in = date("Y-m-d H:i:s");
            $sqlinsert = "INSERT INTO user_log (emp_id, emp_name, emp_role, status, login, logout, time_stamp) 
                          VALUES (?, ?, ?, 'ACTIVE', ?, NULL, CURRENT_TIMESTAMP)";
            $stmt = $connnect->prepare($sqlinsert);
            $stmt->bind_param('ssss', $employee_id, $employee_name, $role, $login_in);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Login successful']);
            } else {
                echo json_encode(['status' => 'error', 'message' => $stmt->error]);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid Employee ID or Password']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Employee ID and Password are required']);
    }
}
?>
