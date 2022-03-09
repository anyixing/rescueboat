<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="icon" type="image/png" href="/img/pfizer.png" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <title>GetVAC</title>
  
</head>

<body style="background-image: url(https://images.pexels.com/photos/1323550/pexels-photo-1323550.jpeg?cs=srgb&dl=pexels-simon-berger-1323550.jpg&fm=jpg); background-size: cover; background-attachment: fixed;">
<header>
  <img width="100px" src="https://www.graphicsprings.com/filestorage/stencils/8998797059cdb8430f42aa60014ec3b9.png?width=500&height=500" alt="">
  <div class="nav-menu">
    <h4 style="margin: 0 2rem;"><a href="admin.php">Organizations</a></h4>
  </div>
  <?php if(isset($_SESSION["username"])) {?>
  <div class="nav-action">
  <h4 style="margin: 0;"><?php echo $_SESSION["fullname"] ?></h4>
  <button style="padding: 10px;" class="btn btn-primary btn-block btn-lg login-btn"><a href="logout.php">Log Out</a></button>
  </div>
  <?php } ?>
</header>