<?php

$con = mysqli_connect("dropboxdb.ca0i0vws4r90.us-east-2.rds.amazonaws.com:3306","admin","dropboxdb#","beacondb");

if (mysqli_connect_errno()) {
    echo "Failed";
} else {
    echo "Success";
}

//$data = $_POST['datapoints'];
$data = json_decode(file_get_contents('php://input'), true);
$data_detail = $data["datapoints"];
echo $data_detail[0]["position"];
//$datapoints = $data["datapoints"];


    
foreach($data["datapoints"] as $detail) {
    $position = $detail["position"];
    $accelerometer = $detail["accelerometer"];
    $gyroscope = $detail["gyroscope"];
    $magnetometer = $detail["magnetometer"];
    $distracted = $detail["distracted"];

    $sql = "INSERT INTO gold_data (position, accelerometer, gyroscope, magnetometer, distracted) VALUES ('$position', '$accelerometer', '$gyroscope', '$magnetometer', '$distracted')";

    if ($sensor_result = mysqli_query($con, $sql)) {			
    } else {
	$status = 0;
        $msg = "Failed to add sensor data";
        echo json_encode(array('status'=>$status, 'msg'=>$msg));
    }
}


mysqli_close($con);
?>

