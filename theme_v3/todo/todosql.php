<?php
include '../db_connection/connection.php';
include '../db_connection/db.php';
session_start();

$action = $_GET['action'];

$username= $_SESSION['employee_name'];
$emp_id =$_SESSION['employee_id'];
$role =$_SESSION['role'];

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($action == 'newtaskdata') {
    if (isset($_POST["taskdata"]) && isset($_POST["username"]) && isset($_POST["empid"]) && isset($_POST["role"])) {
        $taskdata = $_POST["taskdata"];
        $username = $_POST["username"];
        $empid = $_POST["empid"];
        $role = $_POST["role"];
        $status = 'Pending';

        // Prepare the SQL statement
        $stmt = $connnect->prepare("INSERT INTO `todo`(`employeename`, `employeeid`, `role`, `taskdata`, `taskstatus`) VALUES (?, ?, ?, ?, ?)");
        if ($stmt === false) {
            echo json_encode([
                "status" => "error",
                "message" => "Error preparing statement: " . $connnect->error
            ]);
            exit;
        }

        $stmt->bind_param("sssss", $username, $empid, $role, $taskdata, $status);

        if ($stmt->execute()) {
            // Prepare response data
            $response = [
                "status" => "success",
                "message" => "Task added successfully"
            ];
        } else {
            // Handle execution error
            $response = [
                "status" => "error",
                "message" => "Error executing statement: " . $stmt->error
            ];
        }

        $stmt->close();
    } else {
        // Handle missing POST data
        $response = [
            "status" => "error",
            "message" => "Required data not provided"
        ];
    }

    // Return JSON response
    echo json_encode($response);
}


else if ($action == 'fetchTasks') {
    // Default date to today if not set
    $startdate = isset($_POST["fromdate"]) ? $_POST["fromdate"] : date("Y-m-d");
    $enddate = isset($_POST["todate"]) ? $_POST["todate"] : date("Y-m-d");

    // Sanitize and format dates
    $startdate = date("Y-m-d", strtotime($startdate));
    $enddate = date("Y-m-d", strtotime($enddate));

    $taskstatus = isset($_POST['taskstatus']) ? $_POST['taskstatus'] : '';
    $emp_id = isset($_SESSION['employee_id']) ? $_SESSION['employee_id'] : '';
    $role = isset($_SESSION['role']) ? $_SESSION['role'] : '';

    // Build query for task status filter
    $taskstatusquery = "AND `taskstatus` != 'Trash'";
    if (!empty($taskstatus)) {
        $taskstatusquery = "AND `taskstatus` = '$taskstatus'";
    }

    // Query to fetch tasks
    $query = "
        SELECT * 
        FROM `todo` 
        WHERE `timestamp` BETWEEN '$startdate 00:00:00' AND '$enddate 23:59:59'
        AND `employeeid` = '$emp_id' 
        AND `role` = '$role' 
        $taskstatusquery
    ";
    $result = mysqli_query($connnect, $query);

    // Query to count tasks based on status
    $query2 = "
        SELECT `taskstatus`, COUNT(*) as count
        FROM `todo`
        WHERE `timestamp` BETWEEN '$startdate 00:00:00' AND '$enddate 23:59:59'
        AND `employeeid` = '$emp_id' 
        AND `role` = '$role'
        GROUP BY `taskstatus`
    ";
    $result2 = mysqli_query($connnect, $query2);

    if (!$result || !$result2) {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
        exit;
    }

    // Fetch tasks
    $tasks = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $tasks[] = [
            'id' => $row['Id'],
            'description' => $row['taskdata'],
            'status' => $row['taskstatus'],
            'date' => date('Y-m-d', strtotime($row['timestamp'])),
        ];
    }

    // Fetch status counts
    $statusCounts = [];
    while ($row = mysqli_fetch_assoc($result2)) {
        $statusCounts[$row['taskstatus']] = $row['count'];
    }

    // Add overall count
    $totalCount = array_sum($statusCounts);

    echo json_encode([
        'status' => 'success',
        'data' => [
            'tasks' => $tasks,
            'counts' => $statusCounts,
            'totalCount' => $totalCount
        ]
    ]);
    exit;
}

else if ($action == 'updatetaskstatusdata') {
    if (isset($_POST['taskId']) && isset($_POST['newStatus'])) {
        $taskId = $_POST['taskId'];
        $newStatus = $_POST['newStatus'];

        // Sanitize input to prevent SQL injection
        $taskId = mysqli_real_escape_string($connnect, $taskId);
        $newStatus = mysqli_real_escape_string($connnect, $newStatus);
        $today =date('Y-m-d');


            if($newStatus!='COMPLETED'){
                        // Update query to change the status of the task
                    $query = "UPDATE `todo` SET `taskstatus` = '$newStatus' WHERE `id` = '$taskId'";
                    $result = mysqli_query($connnect, $query);


            }else{

                        // Update query to change the status of the task
                    $query = "UPDATE `todo` SET `taskstatus` = '$newStatus',`completeddate`='$today' WHERE `id` = '$taskId'";
                    $result = mysqli_query($connnect, $query);


            }


        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Task status updated successfully']);
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    }
    exit;
}


else if ($action == 'updatetrashstatusdata') {
    if (isset($_POST['taskId']) && isset($_POST['newStatus'])) {
        $taskId = $_POST['taskId'];
        $newStatus = $_POST['newStatus'];

        // Sanitize input to prevent SQL injection
         $taskId = mysqli_real_escape_string($connnect, $taskId);
        $newStatus = mysqli_real_escape_string($connnect, $newStatus);

        // Update query to change the status of the task
         $query = "UPDATE `todo` SET `taskstatus` = '$newStatus' WHERE `id` = '$taskId'";
        $result = mysqli_query($connnect, $query);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Task data moved to trash']);
        } else {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing parameters']);
    }
    exit;
}
?>

