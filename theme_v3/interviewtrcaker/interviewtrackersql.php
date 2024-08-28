<?php
include '../db_connection/connection.php';
include '../db_connection/db.php';
session_start();
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
$action = $_GET['action'];
$username= $_SESSION['employee_name'];
$emp_id =$_SESSION['employee_id'];

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($action == 'interviewtrackerdata'){

    if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
        $startdate = $_POST["start_date"];
        $enddate = $_POST["end_date"];
    }
   else {
        $today = date("Y-m-d");
        $startdate = $today;
        $enddate = $today;
    }

    // Sanitize and format dates
    $startdate = date("Y-m-d", strtotime($startdate));
    $enddate = date("Y-m-d", strtotime($enddate));
// Check if each key exists in the $_POST array before accessing it
    $processdata = isset($_POST['process_type']) ? $_POST['process_type'] : null;
    $referencedata = isset($_POST['reference_mode']) ? $_POST['reference_mode'] : null;
    $statusdata = isset($_POST['status_type']) ? $_POST['status_type'] : null;
    $office_locationdata = isset($_POST['office_location']) ? $_POST['office_location'] : null;
    $shifttype_data = isset($_POST['shifttype']) ? $_POST['shifttype'] : null;
    $processrole_data = isset($_POST['processrole']) ? $_POST['processrole'] : null;
    $teamsname_data = isset($_POST['teamsname']) ? $_POST['teamsname'] : null;

// You can also use a default value or an empty string if the key is not set

    $processquery = '';
    if (!empty($processdata)) {
        $processquery = " AND process_type = '$processdata'";
    }

    $referencequery = '';
    if (!empty($referencedata)) {
        $referencequery = " AND reference_type = '$referencedata'";
    }
    $statusequery = '';
    if (!empty($statusdata)) {
        $statusequery = " AND status = '$statusdata'";
    }
    $office_locationquery = '';
    if (!empty($office_locationdata)) {
        $office_locationquery = " AND office_location = '$office_locationdata'";
    }
    $shifttype_query = '';
    if (!empty($shifttype_data)) {
        $shifttype_query = " AND shift_process = '$shifttype_data'";
    }
    $processrole_query = '';
    if (!empty($processrole_data)) {
        $processrole_query = " AND process_role = '$processrole_data'";
    }
    $teamsname_query = '';
    if (!empty($teamsname_data)) {
        $teamsname_query = " AND team = '$teamsname_data'";
    }
     $sql = "SELECT `id`, `uic_code`, `first_name`, `last_name`, `primary_no`, `seconday_no`, `reference_type`, `reference_role`, `process_type`, `process_role`, `status`, `office_location`, `register_date`, `joining_date`, `offer_release`, `document_status`, `contact_modes`, `description`, `shift_process`, `team`, `contact_modes`, `training_date`  
            FROM `registration_form` 
            WHERE 
             `register_date` BETWEEN '$startdate' AND '$enddate'
            $processquery $referencequery $statusequery $office_locationquery $shifttype_query $processrole_query $teamsname_query";

    $sqlprocessfilter = mysqli_query($connnect, $sql);

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

else if ($action == 'evaluationinsertdata') {
    if (isset($_POST["row_id"]) && isset($_POST["uic_code"])) {
        // Get the form data
        $register_id = mysqli_real_escape_string($connnect, $_POST['row_id']);
        $uic_code = mysqli_real_escape_string($connnect, $_POST['uic_code']);
        $result = mysqli_real_escape_string($connnect, $_POST['result']);
        $location = isset($_POST['evaluationofficelocation']) ? mysqli_real_escape_string($connnect, $_POST['evaluationofficelocation']) : "";
        $score = isset($_POST['score']) ? mysqli_real_escape_string($connnect, $_POST['score']) : "";
        $process = isset($_POST['change_process']) ? mysqli_real_escape_string($connnect, $_POST['change_process']) : "";
        $shift = isset($_POST['shift_process']) ? mysqli_real_escape_string($connnect, $_POST['shift_process']) : "";
        $joiningdate = isset($_POST['joining_date']) ? mysqli_real_escape_string($connnect, $_POST['joining_date']) : "";
        $processrole = isset($_POST['processrole']) ? mysqli_real_escape_string($connnect, $_POST['processrole']) : "";
        $reason = isset($_POST['reason']) ? mysqli_real_escape_string($connnect, $_POST['reason']) : "";
        $evaluateddate = date('Y-m-d H:i:s');
        $username = mysqli_real_escape_string($connnect, $_SESSION['employee_name']); // Ensure $username is defined
        // Prepare the SQL statement for updating the registration form
        $sqlUpdate = "UPDATE `registration_form` 
                      SET `status`='$result', `office_location`='$location', `canditate_score`='$score', 
                          `process_type`='$process', `process_role`='$processrole', `joining_date`='$joiningdate', 
                          `shift_process`='$shift', `evaluated_by`='$username', `evaluated_date`='$evaluateddate', 
                          `reason`='$reason'
                      WHERE `id`='$register_id' AND `uic_code`='$uic_code'";

        // Execute the update query
        if (!mysqli_query($connnect, $sqlUpdate)) {
            echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
            exit;
        }
        else{
            $updatedate = date('Y-m-d H:i:s');
            $insert_query="INSERT INTO `status_log` ( `register_id`, `uic_code`, `status`, `updated_by`, `time_stamp`) VALUES ('$register_id', '$uic_code', '$result', '$updatedate', CURRENT_TIMESTAMP)";   
            if ($connnect->query($insert_query) === TRUE) {
                echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
            }
            else{
            }
        }

      
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
        exit;
    }
}
else if ($action == 'joiningdata') {
    if (isset($_POST["row_id"]) && isset($_POST["uic_code"])) {
        // Get the form data
        $register_id = mysqli_real_escape_string($connnect, $_POST['row_id']);
        $uic_code = mysqli_real_escape_string($connnect, $_POST['uic_code']);
        $contactmodes = isset($_POST['contactmodes']) ? mysqli_real_escape_string($connnect, $_POST['contactmodes']) : "";
        $description = isset($_POST['description']) ? mysqli_real_escape_string($connnect, $_POST['description']) : "";
        $joining_status = isset($_POST['joining_status']) ? mysqli_real_escape_string($connnect, $_POST['joining_status']) : "";
        $offerstatus = isset($_POST['offerstatus']) ? mysqli_real_escape_string($connnect, $_POST['offerstatus']) : "";
        $documentstatus = isset($_POST['documentstatus']) ? mysqli_real_escape_string($connnect, $_POST['documentstatus']) : "";
        $currentdate = date('Y-m-d');
        $select_query = "SELECT no_of_calls FROM registration_form WHERE uic_code = '$uic_code'";
        $sql = mysqli_query($connnect, $select_query);

        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_array($sql);
            $no_of_calls = $row['no_of_calls'] + 1;
         $sqlUpdate = "UPDATE `registration_form` 
        SET `status`='$joining_status', `contact_modes`='$contactmodes', `description`='$description', 
            `offer_release`='$offerstatus', `document_status`='$documentstatus',  
            `training_date`='$currentdate', `no_of_calls`='$no_of_calls'
        WHERE `id`='$register_id' AND `uic_code`='$uic_code'";

        // Execute the update query
        if (!mysqli_query($connnect, $sqlUpdate)) {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
        exit;
        }
        else{
            $updatedate = date('Y-m-d H:i:s');
             $insert_query="INSERT INTO `employee_call_status` ( `register_id`, `uic_code`, `status`, `updated_by`, `updated_date`, `time_stamp`) VALUES ('$register_id', '$uic_code', '$joining_status', '$emp_id', '$updatedate', CURRENT_TIMESTAMP)";   
            if ($connnect->query($insert_query) === TRUE) {
                echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
            }
            else{
            }
        }
}

}
else{
    echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
    exit;
}
}
else if ($action == 'updatetraingdata') {
    $register_id = mysqli_real_escape_string($connnect, $_POST['row_id']);
    $uic_code = mysqli_real_escape_string($connnect, $_POST['uic_code']);
   
    $offerstatus = isset($_POST['offerstatus']) ? mysqli_real_escape_string($connnect, $_POST['offerstatus']) : "";
    $documentstatus = isset($_POST['documentstatus']) ? mysqli_real_escape_string($connnect, $_POST['documentstatus']) : "";

    // Corrected SQL Update query
    $sqlUpdate = "UPDATE `registration_form` 
                  SET `offer_release`='$offerstatus', `document_status`='$documentstatus'  
                  WHERE `id`='$register_id' AND `uic_code`='$uic_code'";

    // Execute the update query
    if (!mysqli_query($connnect, $sqlUpdate)) {
        echo json_encode(['status' => 'error', 'message' => mysqli_error($connnect)]);
        exit;
    } else {
        echo json_encode(['status' => 'success', 'message' => 'Data updated successfully']);      
    }
}
else if ($action == 'checkallteamupdated') {
    header('Content-Type: application/json');

    // Get POST data
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    // Check if the data was received correctly
    if (isset($data['data']) && is_array($data['data'])) {
        $selectedData = $data['data'];

        try {
            // Prepare an SQL statement for updating
            $stmt = $conn->prepare("
                UPDATE registration_form 
                SET process_type = :process_type, 
                    process_role = :process_role, 
                    team = :team 
                WHERE uic_code = :uic_code
            ");

            // Execute the statement for each record
            foreach ($selectedData as $item) {
                $stmt->execute([
                    ':uic_code' => $item['uic_code'], // Corrected the key to match the JavaScript
                    ':process_type' => $item['processtype'],
                    ':process_role' => $item['processrole'],
                    ':team' => $item['teamsname']
                ]);
            }

            // Return a success response
            echo json_encode(['status' => 'success', 'message' => 'Data updated successfully!']);
        } catch (PDOException $e) {
            // Return an error response
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        // Return an error response if data is not valid
        echo json_encode(['status' => 'error', 'message' => 'Invalid data received.']);
    }
}


?>