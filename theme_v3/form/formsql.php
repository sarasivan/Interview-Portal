<?php
// include '../db_connection/connection.php';
// include '../db_connection/db.php';
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

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($action == 'getdataform'){

    $form_type=$_GET['formtype'];

    $sqldata="SELECT `json` FROM `formstructure` WHERE `formtype`='$form_type'";

    $sqlquery=mysqli_query($connnect,$sqldata);
    $sqlfetch=mysqli_fetch_assoc($sqlquery);

   

    // header('Content-Type: application/json');
    echo json_encode($sqlfetch);

}
else if ($_GET['action'] === 'getstatedata') {
    $sql = "SELECT state_id, state_name FROM States";
    $result = $connnect->query($sql);
    
    $states = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $states[] = $row;
        }
    }
    
    echo json_encode($states);
} else if ($_GET['action'] === 'getcitiesdata' && isset($_GET['state_id'])) {
    $state_id = intval($_GET['state_id']);
    
    $sql = "SELECT city_id, city_name FROM Cities WHERE state_id = ?";
    $stmt = $connnect->prepare($sql);
    $stmt->bind_param("i", $state_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $cities = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $cities[] = $row;
        }
    }
    
    echo json_encode($cities);
}

// Check if action parameter is set
else if (isset($_GET['action']) && $_GET['action'] === 'educationdata') {
    // Fetch education levels
    $sql = "SELECT id, level_name FROM education_levels ORDER BY `education_levels`.`id` ASC";
    $result = $connnect->query($sql);

    if ($result) {
        $educationLevels = $result->fetch_all(MYSQLI_ASSOC);

        // Return the data in JSON format
        echo json_encode([
            'educationLevels' => $educationLevels
        ]);
    } else {
        // Handle query error
        echo json_encode(['error' => $connnect->error]);
    }
}
// Check if action parameter is set
else if (isset($_GET['action']) && $_GET['action'] === 'getcoursesdata') {
    // Check if education_level_id is set
    if (isset($_GET['education_level_id'])) {
        $levelId = intval($_GET['education_level_id']);
        
        // Fetch courses for the given education level
        $stmt = $connnect->prepare("SELECT id, course_name FROM courses WHERE education_level_id = ?");
        $stmt->bind_param("i", $levelId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result) {
            $courses = $result->fetch_all(MYSQLI_ASSOC);

            // Return the data in JSON format
            echo json_encode([
                'courses' => $courses
            ]);
        } else {
            // Handle query error
            echo json_encode(['error' => $stmt->error]);
        }
    }
}
else if ($action == 'getoptionform') {
    // Connect to the database (ensure $connnect is already defined and valid)
    $sqldata = "SELECT * FROM `selectoptionsform`";
    $sqlquery = mysqli_query($connnect, $sqldata);

    // Initialize options array
    $options = [];

    // Fetch data from the database
    while ($row = mysqli_fetch_assoc($sqlquery)) {
        $selectionoptionname = $row['selectionoptionname'];
        $optionsvalue = $row['options'];

        // Add to options array
        $options[] = [
            'selectionoptionname' => $selectionoptionname,
            'optionsvalue' => $optionsvalue
        ];
    }

    // Set header to return JSON
    header('Content-Type: application/json');
    echo json_encode($options);

}

else if ($action == 'geteducationform') {
    // Connect to the database (ensure $connnect is already defined and valid)
    $sqldata = "SELECT * FROM `selectoptionsform`";
    $sqlquery = mysqli_query($connnect, $sqldata);

    // Initialize options array
    $options = [];

    // Fetch data from the database
    while ($row = mysqli_fetch_assoc($sqlquery)) {
        $selectionoptionname = $row['selectionoptionname'];
        $optionsvalue = $row['options'];

        // Add to options array
        $options[] = [
            'selectionoptionname' => $selectionoptionname,
            'optionsvalue' => $optionsvalue
        ];
    }

    // Set header to return JSON
    header('Content-Type: application/json');
    echo json_encode($options);
}

// Check if the action parameter is set
else if (isset($_GET['action']) && $_GET['action'] === 'processform1data') {
    // Get the value from POST request
if (isset($_POST['processtype'])) {
    if (isset($_POST['processtype'])) {
        $processtype = $_POST['processtype'];
        // Process the $processtype value as needed
        // For example, echo it back for testing
        echo json_encode(['success' => true, 'processtype' => $processtype]);
    } else {
        // Handle case where 'processtype' is not set
        echo json_encode(['success' => false, 'message' => 'processtype not set']);
    }
   }
    else {
        // Handle case where 'action' parameter is not set or is incorrect
        echo json_encode(['success' => false, 'message' => 'Invalid action']);
    }
} 
          
else if ($action == 'formsubmitted') {
    $data = json_decode(file_get_contents('php://input'), true);
    if ($data) {
         $processType = isset($data['processType']) ? $data['processType'] : '';
        $processRole = isset($data['processRole']) ? $data['processRole'] : '';
        $firstName = isset($data['firstName']) ? $data['firstName'] : '';
        $lastName = isset($data['lastName']) ? $data['lastName'] : '';
        $dob = isset($data['dob']) ? $data['dob'] : '';
        $martialstatus = isset($data['martialstatus']) ? $data['martialstatus'] : '';
        $gender = isset($data['gender']) ? $data['gender'] : '';
        $primaryContactNumber = isset($data['primaryContactNumber']) ? $data['primaryContactNumber'] : '';
        $secondaryContactNumber = isset($data['secondaryContactNumber']) ? $data['secondaryContactNumber'] : '';
        $email = isset($data['email']) ? $data['email'] : '';
        $physicallyChallenged = isset($data['physicallyChallenged']) ? $data['physicallyChallenged'] : '';
        $bloodGroup = isset($data['bloodGroup']) ? $data['bloodGroup'] : '';
        $doorNo = isset($data['doorNo']) ? $data['doorNo'] : '';
        $area = isset($data['area']) ? $data['area'] : '';
        $city = isset($data['city']) ? $data['city'] : '';
        $state = isset($data['state']) ? $data['state'] : '';
        $pincode = isset($data['pincode']) ? $data['pincode'] : '';
        
        if (isset($data['reference'])) {
            $referenceType = $data['reference']['referenceType'] ?? null;
            $referenceName = $data['reference']['referenceName'] ?? null;
            $moreDetails = $data['reference']['moreDetails'] ?? null;
            $officeLocation = $data['reference']['officeLocation'] ?? null;
        } else {
            // Handle the case where 'reference' data is not present
            $referenceType = null;
            $referenceName = null;
            $moreDetails = null;
            $officeLocation = null;
        }
        
        $register_date = date('Y-m-d');
        $currentdate = date('Y-m-d H:i:s');
        $ipaddress = $_SERVER['REMOTE_ADDR'];

        // Check if the primary contact number is already registered
        $select_allready_register = mysqli_query($connnect, "SELECT * FROM `registration_form` WHERE `primary_no` = '$primaryContactNumber'");

        if (mysqli_num_rows($select_allready_register) == 0) {
            // Get the latest UIC code from the database
            $sql = mysqli_query($connnect, "SELECT uic_code FROM `registration_form` ORDER BY `uic_code` DESC LIMIT 1");
            $uic_code = "UIC0001"; // Default UIC code if no records are found
            
            if (mysqli_num_rows($sql) > 0) {
                // Generate new UIC code
                $row = mysqli_fetch_array($sql);
                $uic_id = $row['uic_code'];
                $numeric_part = substr($uic_id, 3); // Remove 'UIC' prefix
                $numeric_part++; // Increment the numeric part
                $uic_code = "UIC" . str_pad($numeric_part, 4, '0', STR_PAD_LEFT); // Pad with leading zeros if necessary
            }
            $status = "New";
             $insert_query = "INSERT INTO `registration_form` (`uic_code`, `first_name`, `last_name`, `dob`, `marital_status`, `gender`, `primary_no`, `seconday_no`, `email`, `physically_challege`, `blood_group`, `door_no`, `area`, `city`, `state`, `pincode`, `process_type`, `process_role`, `reference_type`, `reference_role`, `office_location`, `more_details`, `status`, `register_date`, `canditate_score`, `shift_process`, `evaluated_by`, `evaluated_date`, `joining_date`, `reason`, `no_of_calls`, `offer_release`, `document_status`, `team`, `time_stamp`, `ip_address`, `description`, `contact_modes`, `training_date`) 
                            VALUES ('$uic_code', '$firstName', '$lastName', '$dob', '$martialstatus', '$gender', '$primaryContactNumber', '$secondaryContactNumber', '$email', '$physicallyChallenged', '$bloodGroup', '$doorNo', '$area', '$city', '$state', '$pincode', '$processType', '$processRole', '$referenceType', '$referenceName', '$officeLocation', '$moreDetails', '$status', '$register_date', '', '', '', '', '', '0', '', '', '', '', '$currentdate', '$ipaddress','','','')";

            if ($connnect->query($insert_query) === TRUE) {
                // Fetch the newly inserted record's ID
                $select_query = "SELECT * FROM registration_form WHERE uic_code = '$uic_code'";
                $sql = mysqli_query($connnect, $select_query);

                if (mysqli_num_rows($sql) > 0) {
                    $row = mysqli_fetch_array($sql);
                    $register_id = $row['id'];
                
                    // Process education data
                    foreach ($data['education'] as $education) {
                        $educationalType = mysqli_real_escape_string($connnect, $education['educationalType']);
                        $educationalRole = mysqli_real_escape_string($connnect, $education['educationalRole']);
                        $passingYear = mysqli_real_escape_string($connnect, $education['passingYear']);
                        
                        $select_query = "SELECT * FROM education_details WHERE uic_code = '$uic_code' AND education_type='$educationalType' AND education_role='$educationalRole'";
                        $sql_check = mysqli_query($connnect, $select_query);
                
                        if (mysqli_num_rows($sql_check) > 0) {
                            echo json_encode(['success' => false, 'message' => 'This Education Details Already Entered']);
                            exit(); // Exit after sending the response to prevent further execution
                        } else {
                            $sql_education = "INSERT INTO education_details (register_id, uic_code, education_type, education_role, passing_year) 
                                              VALUES ('$register_id', '$uic_code', '$educationalType', '$educationalRole', '$passingYear')";
                            mysqli_query($connnect, $sql_education);
                        }
                    }
                
                    // Process experience data
                    foreach ($data['experience'] as $experience) {
                        $companyName = mysqli_real_escape_string($connnect, $experience['companyName']);
                        $designation = mysqli_real_escape_string($connnect, $experience['designation']);
                        $joiningDate = mysqli_real_escape_string($connnect, $experience['joiningDate']);
                        $relievingDate = mysqli_real_escape_string($connnect, $experience['relievingDate']);
                        
                        $joiningDateTime = new DateTime($joiningDate);
                        $relievingDateTime = new DateTime($relievingDate);
                        $interval = $joiningDateTime->diff($relievingDateTime);
                        $totalExperience = $interval->format('%y years, %m months, %d days');
                        
                        $sql_experience = "INSERT INTO experience_details (register_id, uic_code, company_name, designation, joining_date, relieving_date, year, time_stamp) 
                                           VALUES ('$register_id', '$uic_code', '$companyName', '$designation', '$joiningDate', '$relievingDate', '$totalExperience', CURRENT_TIMESTAMP)";
                        mysqli_query($connnect, $sql_experience);
                    }
                
                    // Return success response
                    echo json_encode(['success' => true, 'message' => 'Registration successful']);
                } else {
                    // Return failure response
                    echo json_encode(['success' => false, 'message' => 'Failed to retrieve the inserted record']);
                }
                
            } else {
                // Return failure response
                echo json_encode(['success' => false, 'message' => 'Failed to insert data into registration_form']);
            }
        } else {
            // Primary contact number is already registered
            echo json_encode(['success' => false, 'message' => 'Primary contact number is already registered']);
        }
    } else {
        // Invalid input data
        echo json_encode(['success' => false, 'message' => 'Invalid input data']);
    }
}


?>