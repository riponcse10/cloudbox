<?php

$con = mysqli_connect("dropboxdb.ca0i0vws4r90.us-east-2.rds.amazonaws.com:3306","admin","dropboxdb#","beacondb");

session_start();
$_SESSION['registerfailed'] = "";

if (mysqli_connect_errno()) {
    echo "Failed";
} else {
    //echo "Success";
}

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO user (username, firstname, lastname, email, password) VALUES ('$username', '$firstname', '$lastname', '$email', '$password')";

if ($result = mysqli_query($con, $sql)) {

    $status = 1;
    $msg = "Successfully registered";
    if ($_POST['source'] == 'web') {
        header("Location: userlogin.php");
        $_SESSION['registerfailed'] = "";
	$_SESSION['loginfail'] = "Registration successful! Please Login to your account.";
    } else {
	echo json_encode(array('status'=>$status, 'msg'=>$msg));
    }
} else {

    $status = 0;
    $msg = "Failed to add";
    if ($_POST['source'] == 'web') {
        $_SESSION['registerfailed'] = "Registration failed! Please use another username!";
	header("Location: userregister.php");
    } else {
	echo json_encode(array('status'=>$status, 'msg'=>$msg));
    }
}

mysqli_close($con);
?>


