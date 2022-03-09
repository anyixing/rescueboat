<?php 
session_start();
 if(isset($_SESSION["username"])) {
    include_once 'includes/header.php';
    include('includes/db.php');
    $orgID = $_GET['orgID'];
    $result = mysqli_query($conn, "SELECT orgName, address FROM organization WHERE orgID = '$orgID'");
    $org = mysqli_fetch_assoc($result);
    $orgName = $org['orgName'];
    $orgAddress = $org['address'];
?>

<body
    style="background-image: url(https://news.emory.edu/features/2021/07/emory-inspired-vaccinations/assets/AUFW5W25an/footer-v2-h-no-logo-1734x970-1734x970-1734x970.jpeg); background-size: contain;">
    <div class="main-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
   
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="doc-info-cont">
                                            <h1 id="clinic-name"><?php echo $orgName  ?> [ <?php echo $orgID  ?> ] </h1>


                                           
                                                <p style="margin: 0;" class="doc-location" id="clinic-address"><i
                                                        class="fas fa-map-marker-alt"></i> <?php echo $orgAddress ?></p>
                        
                                        </div>
                            </div>
                        </div>
                        <div class="card">
                        <div class="title-rep">
                        <h2 style="margin: 0;">Representatives</h2>
                        <button style="padding: 10px;" class="btn btn-primary btn-block btn-lg login-btn" data-toggle="modal" data-target="#modal"><i
                                                        class="fa fa-plus-circle"></i>      Register</button>
                        </div>
                            <div class="card-body">
                                <div class="doctor-widget">
                                <div class="appointments">
                                <?php
                                         
                                         $result = mysqli_query($conn, "SELECT * FROM users WHERE username IN (SELECT username FROM organizationrep WHERE orgID = '$orgID')");
                                         //select all users where username exists in organizationrep table

                                         while ($row = mysqli_fetch_array($result)) { 
                                            $username = $row["username"];
                                            $result2 = mysqli_query($conn, "SELECT jobTitle FROM organizationrep WHERE username = '$username'");
                                            $org2 = mysqli_fetch_assoc($result2);
                                            $jobTitle = $org2['jobTitle'];
                                             ?>
                                                    
                                                    <div class="appointment-list">
                                                    <div class="profile-info-widget">
                                                        <div class="profile-det-info">
                                                           
                                                            <div class="patient-details">
                                                            <h3 class="batch-id" style="margin: 0;"><?php echo $row["fullname"]; ?></h3>
                                                                <h5 style="margin: 0;" class="expiry-date"><i class="fa fa-envelope"></i> <?php echo $row["email"]; ?>
                                                                </h5>
                                                                <h5 style="margin: 0;" class="quantity-batch"><i class="fa fa-phone"></i> <?php echo $row["mobileNo"]; ?></h5>
                                                                <h5 style="margin: 0;" class="administrated"><i class="fa fa-user"></i> <?php echo $jobTitle ?></h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <?php }?>
                                                </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade custom-modal" id="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Appointment Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <?php if (isset($_GET['error'])) { ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo $_GET['error']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php } ?>
                          <form action="reg.php" method="POST">
                            <div class="form-group form-focus">
                              <input type="hidden" id="orgID" name="orgID" value="<?php echo $orgID ?>">
                              <?php if (isset($_GET['username'])) { ?>
                                <input type="text" id="username-patient" name="username" class="form-control floating" value="<?php echo $_GET['username']; ?>">
                              <?php }else{ ?>
                                <input type="text" id="username-patient" name="username" class="form-control floating">
                              <?php }?>
                              <label class="focus-label">Username</label>
                            </div>
                            <div class="form-group form-focus">
                            <?php if (isset($_GET['fullname'])) { ?>
                              <input type="text" id="fullname" name="fullname" class="form-control floating" value="<?php echo $_GET['fullname']; ?>">
                              <?php }else{ ?>
                                <input type="text" id="fullname" name="fullname" class="form-control floating">
                                <?php }?>
                              <label class="focus-label">Full name</label>
                            </div>
                            <div class="form-group form-focus">
                            <?php if (isset($_GET['email'])) { ?>
                              <input type="email" id="email" name="email" class="form-control floating" value="<?php echo $_GET['email']; ?>">
                              <?php }else{ ?>
                                <input type="email" id="email" name="email" class="form-control floating">
                                <?php }?>
                              <label class="focus-label">Email</label>
                            </div>
                            <div class="form-group form-focus">
                              <input type="text" id="mobile" name="mobile"
                                class="form-control floating">
                              <label class="focus-label">Mobile Number</label>
                            </div>
                            <div class="form-group form-focus">
                              <input type="password" id="job" name="job" class="form-control floating">
                              <label class="focus-label">Job Title</label>
                            </div>
                    
                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Register</button>

                          </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include_once 'includes/footer.php';
 }
?>