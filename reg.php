<?php
session_start();
include('includes/db.php');

$username = $mobile = $job = $email = $orgID = $fullname = $password = 'password';


function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

$username = validate($_POST['username']);
$email = validate($_POST['email']);
$fullname = validate($_POST['fullname']);
$mobile = validate($_POST['mobile']);
$job = validate($_POST['job']);
$orgID = validate($_POST['orgID']);

$user_data = 'username='. $username. '&fullname='. $fullname . '&email='. $email . '&mobile='. $mobile . '&job='. $job . '&orgID='. $orgID;

if (empty($username)) {
    header("Location: organization.php?error=Username is required&$user_data");
    exit();
}else if(empty($mobile)){
    header("Location: organization.php?error=Mobile number is required&$user_data");
    exit();
}
else if(empty($job)){
    header("Location: organization.php?error=Job Title is required&$user_data");
    exit();
}

else if(empty($fullname)){
    header("Location: organization.php?error=Name is required&$user_data");
    exit();
}

else if(empty($email)){
    header("Location: organization.php?error=Email is required&$user_data");
    exit();
}

else {

    $sql = "INSERT INTO users (username, password, email, fullname, mobileNo) VALUES ('$username', '12345', '$email', '$fullname', '$mobile')";
    $result = mysqli_query($conn, $sql);
    $sql2 = "INSERT INTO organizationrep (username, jobTitle, orgID) VALUES ('$username', '$job', '$orgID')";
    $result = mysqli_query($conn, $sql2);
    if($result){
        $to = "$email";
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: webmaster@example.com" . "\r\n" .
        "CC: somebodyelse@example.com";

        mail($to,$subject,$txt,$headers);
        header("Location: organization.php?success=Registration successfull!");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
