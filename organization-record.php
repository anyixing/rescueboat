<?php
session_start();
include('includes/db.php');

$orgID = $orgAddress = $orgName;


function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

$orgAddress = $_POST['orgAddress'];
$orgName = $_POST['orgName'];
$orgID = validate($_POST['orgID']);

$org_data = 'orgID='. $orgID. '&orgName='. $orgName . '&orgAddress='. $orgAddress;

if (empty($orgName)) {
    header("Location: organization.php?error=Name is required&$org_data");
    exit();
}else if(empty($orgAddress)){
    header("Location: organization.php?error=Address is required&$org_data");
    exit();
}

else {

    $sql = "INSERT INTO organization (orgID, orgName, address) VALUES ('$orgID', '$orgName', '$orgAddress')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("Location: admin.php?success=Registration successfull!");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

}
