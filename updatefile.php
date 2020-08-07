<?php

$con = mysqli_connect("dropboxdb.ca0i0vws4r90.us-east-2.rds.amazonaws.com:3306","admin","dropboxdb#","beacondb");

if (mysqli_connect_errno()) {
    echo "Failed";
} else {
    //echo "Success";
}

$filename = $_POST['filename'];
$username = $_POST['username'];
$lastupdate = $_POST['lastupdate'];
$lastsync = $_POST['lastsync'];

$sql = "UPDATE file SET lastupdate = $lastupdate, lastsync = $lastsync WHERE filename = '$filename' and username = '$username'";

if ($result = mysqli_query($con, $sql)) {

    $status = 1;
    $msg = "Successfully updated";
    echo json_encode(array('ststus'=>$status, 'msg'=>$msg));
} else {

    $status = 0;
    $msg = "Failed to add";
    echo json_encode(array('status'=>$status, 'msg'=>$msg));
}

mysqli_close($con);
?>

