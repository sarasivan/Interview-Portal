<?php
include '../db_connection/connection.php';
include '../db_connection/db.php';
session_start();

$action = $_GET['action'];

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($action == 'showtabledata'){
    $sqldata="SELECT id,employe_id,employe_name,employee_role,dashboard,interview_trackers,settings,usertable,siderbar FROM `dashboard_structure` where 1";
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


else if($action == 'uptabledata') {
    if(isset($_POST['dataId']) && isset($_POST['headerColumndata']) && isset($_POST['headerColumn'])) {
        $dataid = $_POST['dataId'];
        $headerColumndata = $_POST['headerColumndata'];
        $headerColumn = $_POST['headerColumn'];

        // Toggle the value of headerColumndata
        if($headerColumndata == 'yes') {
            $headerColumndata = 'no';
        } else {
            $headerColumndata = 'yes';
        }

        // Sanitize inputs to prevent SQL injection
        $dataid = mysqli_real_escape_string($connnect, $dataid);
        $headerColumndata = mysqli_real_escape_string($connnect, $headerColumndata);
        $headerColumn = mysqli_real_escape_string($connnect, $headerColumn);

        // Construct dynamic SQL query
        $sqldata = "UPDATE `dashboard_structure` SET `$headerColumn` = '$headerColumndata' WHERE `id` = '$dataid'";
        $sqlprocessfilter = mysqli_query($connnect, $sqldata);

        if (!$sqlprocessfilter) {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
            exit;
        }

        echo json_encode(['status' => 'success', 'message' => 'Data updated successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
    }
}



?>
