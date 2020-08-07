<?php

$con = mysqli_connect("dropboxdb.ca0i0vws4r90.us-east-2.rds.amazonaws.com:3306","admin","dropboxdb#","beacondb");

session_start();

if (mysqli_connect_errno()) {
    echo "Failed";
    $_SESSION['loginfail'] = "Login Failed! Try Again!";
} else {
    //echo "Success";
}
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * from user where username = '$username' and password = '$password'";

if ($result = mysqli_query($con, $sql)) {

    if ($result->num_rows > 0) {
	$status = 1;
        $msg = "Username exists";
	$_SESSION['loginfail'] = "";
	$_SESSION['user'] = $username;
	if ($_POST['source'] == 'web') {
	    $row = $result->fetch_object();
	    $jsonObj = json_encode($row);
	    //echo $jsonObj;
	    $jsonArray = json_decode($jsonObj, true);
	    
	    $_SESSION['firstname'] = $jsonArray['firstname'];
	    $_SESSION['lastname'] = $jsonArray['lastname'];
	    //echo $_SESSION['firstname'];
	    header("Location: uploadnew.php");
	} else {
	    echo json_encode(array('status'=>$status, 'msg'=>$msg));
	}
    } else {
        $status = 0;
        $msg = "Username does not exist";
	if ($_POST['source'] == 'web') {
	    $_SESSION['loginfail'] = "Login Failed! Try Again!";
            header("Location: userlogin.php");
        } else {
            echo json_encode(array('status'=>$status, 'msg'=>$msg));
        }
    }
}

mysqli_close($con);
?>

