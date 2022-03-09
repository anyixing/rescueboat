<?php
include_once 'includes/header.php';
?>

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8 offset-md-2">

          <div class="account-content">
            <div style="height: 70vh;" class="row align-items-center justify-content-center">
              <div class="col-md-12 col-lg-6 login-right">
                <div style="text-align: center;" class="login-header">
                  <h3>Sign In</h3>
                </div>
                <?php if (isset($_GET['error'])) { ?>
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?php echo $_GET['error']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php } ?>
                        <?php if (isset($_GET['success'])) { ?>
                          <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <?php echo $_GET['success']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                        <?php } ?>
                <form action="log.php" method="POST">
                  <div class="form-group form-focus">
                    <input type="text" id="username" name="username" class="form-control floating">
                    <label class="focus-label">Username</label>
                  </div>
                  <div class="form-group form-focus">
                    <input type="password" id="password" name="password" class="form-control floating">
                    <label class="focus-label">Password</label>
                  </div>

                  <button class="btn btn-primary btn-block btn-lg login-btn" type="submit">Login</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

<?php

include_once 'includes/footer.php';
?>