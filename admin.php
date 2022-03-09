<?php 
session_start();
 if(isset($_SESSION["username"])) {
    include_once 'includes/header.php';
    include('includes/db.php');
?>

    <div class="main-wrapper">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-xl-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                <div class="title-rep">
                        <h2 style="margin: 0;">Organizations</h2>
                        </div>
                                    <div class="card-body pt-0">
                                        <div style="margin-top: 25px;" class="appointments">
                                            <div class="row">
                                            <?php
                                            $result = mysqli_query($conn, "SELECT * FROM organization");
                                            while ($row = mysqli_fetch_array($result)) { 
                                                
                                                ?>
                                                <div class="col-sm-6 col-md-6 col-xl-4">
                                                    <div class="profile-widget">
              
                                                        <div class="pro-content">
                                                            <h3 class="title">
                                                                <a href="organization.php?orgID=<?php echo $row["orgID"]; ?>"><?php echo $row["orgName"]; ?></a>

                                                              

                                                            </h3>
                                                            <br>
                                                            <ul class="available-info">
                                                                <li id="clinic-address">
                                                                    <i class="fas fa-map-marker-alt"></i> <?php echo $row["address"]; ?>
                                                                </li>
                                                                <li id="batches-available"">
                                                        <i class="fa fa-hashtag"></i> <?php echo $row["orgID"]; ?>
                                                                </li>
                            

                                                            </ul>
                                                            <div class="row row-sm">
                                                                <div class="col-12">
                                                                    <a href="organization.php?orgID=<?php echo $row["orgID"]; ?>"
                                                                        class="btn book-btn">Select</a> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
 <?php } ?>
 <div class="col-sm-6 col-md-6 col-xl-4">
                                                    <div class="profile-widget-add">
              
                                                        <div class="pro-content" data-toggle="modal" data-target="#modal">
                                                            <h3 class="title" style="margin-bottom: 20px; color: lightgrey;">
                                                                Add Organization
                                                            </h3>
                                                     
                                                            <div class="row row-sm">
                                                                <div class="col-12">
                                                                <i style="font-size: 25px; color: lightgrey;" class="fa fa-plus-circle fa-3"></i> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
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
                          <form action="organization-record.php" method="POST">
                              <input type="hidden" id="orgID" name="orgID" value="test123">
                              
                            <div class="form-group form-focus">
                              <input type="text" id="orgName" name="orgName"
                                class="form-control floating">
                              <label class="focus-label">Organization Name</label>
                            </div>
                            <div class="form-group form-focus">
                              <input type="text" id="orgAddress" name="orgAddress" class="form-control floating">
                              <label class="focus-label">Organization Address</label>
                            </div>
                    
                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Record</button>

                          </form>
                </div>
            </div>
        </div>
    </div>

<?php

include_once 'includes/footer.php';
    } else { 
        header("Location: login.php");
        exit(); 
}
?>