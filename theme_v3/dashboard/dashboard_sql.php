<?php
 include '../db_connection/connection.php';
 include '../db_connection/db.php';
//my sql connection code  
 $action=$_GET['action'];
// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// & dashboard  all count
if($action=='dashboardcarddata'){

        if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
            $startdate = $_POST["start_date"];
            $enddate = $_POST["end_date"];
        } else {
            $today = date("Y-m-d");
            $startdate = $today;
            $enddate = $today;
        }
        // Sanitize and format dates
        $startdate = date("Y-m-d", strtotime($startdate));
        $enddate = date("Y-m-d", strtotime($enddate));
        $sql2 =mysqli_query($connnect,"SELECT
                      COUNT(`uic_code`) AS `REGISTERATION_count`,
                      IFNULL(SUM(CASE WHEN status != 'New' THEN 1 ELSE 0 END), 0) AS `INTERVIEW_count`,
                      IFNULL(SUM(CASE WHEN status='Selected' THEN 1 ELSE 0 END), 0) AS `SELECTED_count`,
                      IFNULL(SUM(CASE WHEN status='Rejected' THEN 1 ELSE 0 END), 0) AS `REJECTED_count`,
                      IFNULL(SUM(CASE WHEN status='Hold' THEN 1 ELSE 0 END), 0) AS `HOLD_count`,
                      IFNULL(SUM(CASE WHEN status='On Training' THEN 1 ELSE 0 END), 0) AS `TRAINING_count`
                      FROM `registration_form` 
                      WHERE `register_date` BETWEEN '$startdate 00:00:00' AND '$enddate 23:59:59'");
        $result = mysqli_fetch_assoc($sql2);
        echo json_encode($result);
}

// & all joining status count
if($action=='all_joining_status'){

    if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
        $startdate = $_POST["start_date"];
        $enddate = $_POST["end_date"];
    } else {
        $today = date("Y-m-d");
        $startdate = $today;
        $enddate = $today;
    }
    
    $query = "SELECT
                IFNULL(SUM(CASE WHEN status = 'On Training' THEN 1 ELSE 0 END), 0) AS `On_Training`,
                IFNULL(SUM(CASE WHEN status = 'Not Joined' THEN 1 ELSE 0 END), 0) AS `Not_Joined`,
                IFNULL(SUM(CASE WHEN status = 'Pending' THEN 1 ELSE 0 END), 0) AS `PENDING`
              FROM registration_form
              WHERE training_date BETWEEN :startdate AND :enddate";
    
    // Prepare the SQL statement
    $sth = $conn->prepare($query);
    $sth->bindValue(':startdate', "$startdate 00:00:00");
    $sth->bindValue(':enddate', "$enddate 23:59:59");
    
    // Execute the statement
    $sth->execute();
    
    // Fetch all results as an associative array
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    // Check if the result is empty and return an empty array if no results are found
    if (empty($result)) {
        $result = []; 
    }
    
    // Return the result as a JSON response
    echo json_encode($result);
    
}
// & process type  all count
if ($action == 'process_types_count') {
  
    if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
        $startdate = $_POST["start_date"];
        $enddate = $_POST["end_date"];
    } else {
        $today = date("Y-m-d");
        $startdate = $today;
        $enddate = $today;
    }
        // SQL query to count process types within the date range
        $query = "SELECT 
            IFNULL(SUM(CASE WHEN process_type = 'Healthcare' THEN 1 ELSE 0 END), 0) AS Healthcare,
            IFNULL(SUM(CASE WHEN process_type = 'IT' THEN 1 ELSE 0 END), 0) AS IT,
            IFNULL(SUM(CASE WHEN process_type = '3D-Designing' THEN 1 ELSE 0 END), 0) AS `3D-Designing`,
            IFNULL(SUM(CASE WHEN process_type = 'Business-Development' THEN 1 ELSE 0 END), 0) AS `Business-Development`,
            IFNULL(SUM(CASE WHEN process_type = 'BPO' THEN 1 ELSE 0 END), 0) AS BPO,
            IFNULL(SUM(CASE WHEN process_type = 'Others' THEN 1 ELSE 0 END), 0) AS Others
            FROM registration_form 
            WHERE evaluated_date BETWEEN :startdate AND :enddate";

        $sth = $conn->prepare($query);
        $sth->bindValue(':startdate', "$startdate 00:00:00");
        $sth->bindValue(':enddate', "$enddate 23:59:59");
        $sth->execute();

        // Fetch the result as an associative array
        $result = $sth->fetch(PDO::FETCH_ASSOC);

        // If no results found, initialize with zeros
        if (!$result) {
            $result = [
                "Healthcare" => 0,
                "IT" => 0,
                "3D-Designing" => 0,
                "Business-Development" => 0,
                "BPO" => 0,
                "Others" => 0
            ];
        }

        // Output JSON encoded result
        echo json_encode($result);
  
}
// & reference type  all count
if ($action == 'All_reference_type') {
    if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
        $startdate = $_POST["start_date"];
        $enddate = $_POST["end_date"];
    } else {
        $today = date("Y-m-d");
        $startdate = $today;
        $enddate = $today;
    }

    // SQL query to summarize the reference modes
    $query = "SELECT
        IFNULL(SUM(CASE WHEN reference_type = 'Campus-Placements' THEN 1 ELSE 0 END), 0) AS `CAMPUS-PLACEMENTS`,
        IFNULL(SUM(CASE WHEN reference_type = 'Consultancy' THEN 1 ELSE 0 END), 0) AS `CONSULTANCY`,
        IFNULL(SUM(CASE WHEN reference_type = 'Direct-Walk-Ins' THEN 1 ELSE 0 END), 0) AS `DIRECT-WALK-INS`,
        IFNULL(SUM(CASE WHEN reference_type = 'Employee-Referral' THEN 1 ELSE 0 END), 0) AS `EMPLOYEE-REFERRAL`,
        IFNULL(SUM(CASE WHEN reference_type = 'HR-Reference' THEN 1 ELSE 0 END), 0) AS `HR-REFERENCE`,
        IFNULL(SUM(CASE WHEN reference_type = 'Portals' THEN 1 ELSE 0 END), 0) AS `PORTALS`,
        IFNULL(SUM(CASE WHEN reference_type = 'Others' THEN 1 ELSE 0 END), 0) AS `OTHERS`
        FROM registration_form 
        WHERE evaluated_date BETWEEN :startdate AND :enddate";

    // Prepare the SQL statement
    $sth = $conn->prepare($query);
    $sth->bindValue(':startdate', "$startdate 00:00:00");
    $sth->bindValue(':enddate', "$enddate 23:59:59");

    // Execute the statement
    $sth->execute();

    // Fetch all results as an associative array
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);

    // Check if the result is empty and return an empty array if no results are found
    if (empty($result)) {
        $result = []; 
    }

    // Return the result as a JSON response
    echo json_encode($result);
}

// hr wise count 


else if($action=='hrwisecount'){

    if (isset($_POST["start_date"]) && isset($_POST["end_date"])) {
        $startdate = $_POST["start_date"];
        $enddate = $_POST["end_date"];
    } else {
        $today = date("Y-m-d");
        $startdate = $today;
        $enddate = $today;
    }

         $startdate = date("Y-m-d", strtotime($startdate));
         $enddate = date("Y-m-d", strtotime($enddate));


        $sql =mysqli_query($connnect,"SELECT COUNT(`uic_id`) AS REGISTERATION_count FROM `interview_registration_form`  WHERE `status` = $status AND `interviewed_date` BETWEEN '$startdate' AND '$enddate' ");
        $result = mysqli_fetch_assoc($sql);
        
       
        echo json_encode($result);


}

?>