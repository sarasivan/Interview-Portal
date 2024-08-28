<?php
include '../db_connection/connection.php';
include '../db_connection/db.php';
session_start();

$action = $_GET['action'];

// Display all errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if($action == 'processtypefilterdata') {
    $sqlprocessfilter = mysqli_query($connnect, "SELECT options FROM selectoptionsform WHERE selectionoptionname='processtype'");
    
    $results = [];
    while ($row = mysqli_fetch_assoc($sqlprocessfilter)) {
        // Split the options into an array
        $optionsArray = explode(',', $row['options']);
        
        // Add each option to the results array
        foreach($optionsArray as $option) {
            $results[] = ['options' => $option];
        }
    }
    
    echo json_encode($results);
}

else if($action == 'referencemodedata'){
    $sqlreferencetypefilter = mysqli_query($connnect, "SELECT options FROM selectoptionsform WHERE selectionoptionname='referencetype'");
    
    $results = [];
    while ($row = mysqli_fetch_assoc($sqlreferencetypefilter)) {
        // Split the options into an array
        $optionsArray = explode(',', $row['options']);
        
        // Add each option to the results array
        foreach($optionsArray as $option) {
            $results[] = ['options' => $option];
        }
    }
    
    echo json_encode($results);
}
else if($action == 'officelocationdata'){
    $sqlofficelocationfilter = mysqli_query($connnect, "SELECT options FROM selectoptionsform WHERE selectionoptionname='officelocation'");
    $results = [];
    while ($row = mysqli_fetch_assoc($sqlofficelocationfilter)) {
        // Split the options into an array
        $optionsArray = explode(',', $row['options']);
        
        // Add each option to the results array
        foreach($optionsArray as $option) {
            $results[] = ['options' => $option];
        }
    }
    echo json_encode($results);
}
else if($action=='evaluationstatusdata'){
    $sqlstatusfilter = mysqli_query($connnect, "SELECT options FROM selectoptionsform WHERE selectionoptionname='evaluation_status'");
    $results = [];
    while ($row = mysqli_fetch_assoc($sqlstatusfilter)) {
        // Split the options into an array
        $optionsArray = explode(',', $row['options']);
        
        // Add each option to the results array
        foreach($optionsArray as $option) {
            $results[] = ['options' => $option];
        }
    }
    echo json_encode($results);
}
else if($action=='processroledata'){
    $sqlprocessrolefilter = mysqli_query($connnect, "SELECT options FROM selectoptionsform WHERE selectionoptionname='processrole'");
    $results = [];
    while ($row = mysqli_fetch_assoc($sqlprocessrolefilter)) {
        // Split the options into an array
        $optionsArray = explode(',', $row['options']);
        
        // Add each option to the results array
        foreach($optionsArray as $option) {
            $results[] = ['options' => $option];
        }
    }
    echo json_encode($results);
}
else if($action=='shiftdata'){
    $sqlshiftfilter = mysqli_query($connnect, "SELECT options FROM selectoptionsform WHERE selectionoptionname='shiftypes'");
    $results = [];
    while ($row = mysqli_fetch_assoc($sqlshiftfilter)) {
        // Split the options into an array
        $optionsArray = explode(',', $row['options']);
        
        // Add each option to the results array
        foreach($optionsArray as $option) {
            $results[] = ['options' => $option];
        }
    }
    echo json_encode($results);
}
else if($action=='canditatescoredata'){
    $sqlscorefilter = mysqli_query($connnect, "SELECT options FROM selectoptionsform WHERE selectionoptionname='canditate_score'");
    $results = [];
    while ($row = mysqli_fetch_assoc($sqlscorefilter)) {
        // Split the options into an array
        $optionsArray = explode(',', $row['options']);
        
        // Add each option to the results array
        foreach($optionsArray as $option) {
            $results[] = ['options' => $option];
        }
    }
    echo json_encode($results);
}
else if ($action == 'teamnamefilterdata') {
    if (isset($_POST['process_type'])) {
        $process_type = $_POST['process_type'];
        
        // Prepare the SQL query
        $sth = $conn->prepare("SELECT id, name FROM `teams` WHERE process_name = :process_type");
        $sth->bindParam(':process_type', $process_type);
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            echo json_encode(['teams' => $result]); // Wrap the result in a 'teams' key
        } else {
            echo json_encode(['teams' => []]); // Ensure the response has a 'teams' key
        }
    }
}


?>