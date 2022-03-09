<?php
session_start();
include('includes/db.php');

if (isset($_POST['username']) && isset($_POST['password'])) {

function validate($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }

$username = validate($_POST['username']);
$password = validate($_POST['password']);

if (empty($username)) {
    header("Location: login.php?error=Username is required");
    exit();
}else if(empty($password)){
    header("Location: login.php?error=Password is required");
    exit();
}
else {
    if($username === 'admin' && $password === 'admin') {
        header("Location: admin.php");
        $_SESSION['fullname'] = 'HELP AID Admin';
        $_SESSION['username'] = 'admin';
        exit();
    }
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $username && $row['password'] === $password) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['fullname'] = $row['fullname'];
            	$_SESSION['email'] = $row['email'];
                $_SESSION['mobileNo'] = $row['mobileNo'];
                $sql = "SELECT * FROM organizationrep WHERE username='$username'";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) === 1) {
                    header("Location: login.php?error=Cannot login at the moment!");
                    exit();
                } 
		        
            }
            else{
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}

} 

}else{
	header("Location: admin.php");
	exit();
}
