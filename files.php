<?php

$con = mysqli_connect("dropboxdb.ca0i0vws4r90.us-east-2.rds.amazonaws.com:3306","admin","dropboxdb#","beacondb");

if (mysqli_connect_errno()) {
    echo "Failed";
} else {
    //echo "Success";
}

$sql = "SELECT * from file where username = '$_GET[username]'";

if ($result = mysqli_query($con, $sql)) {

    $resultArray = array();
    $tempArray = array();

    while ($row = $result->fetch_object()) {
        $tempArray = $row;
        array_push($resultArray, $tempArray);
    }
    echo json_encode($resultArray);
}

mysqli_close($con);
?>
