<?php 
include "../lib/Session.php";
Session::checkLogin();

?>
<?php
    include "../config/config.php";
    include "../lib/Database.php";

    $db = new Database();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Starlight Responsive Bootstrap 4 Admin Template</title>

    <!-- vendor css -->
    <link href="./lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="./lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="./lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="./css/starlight.min.css">
    <!-- Sweet alert 2 -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  </head>

  <body>

  

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

  <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
    <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">VESPA <span class="tx-info tx-normal">Admin</span></div>
    <div class="tx-center mg-b-60">Log In</div>

    <div class="form-group">
      <form action="action/login.php" method="post">
        <input name="username" type="text" class="form-control" placeholder="Enter your username or Email">
    </div><!-- form-group -->
    <div class="form-group">
      <input name="password" type="password" class="form-control" placeholder="Enter your password">
      <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
    </div><!-- form-group -->
    <input type="submit" name="submit" class="btn btn-info btn-block" value="Log In">
    </form>
    <div class="mg-t-60 tx-center">Not yet a member? <a href="signup.php" class="tx-info">Sign Up</a></div>
  </div><!-- login-wrapper -->
</div><!-- d-flex -->

<!-- Password Mismatch ALERT-->
<?php if(isset($_SESSION['wrong_password'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '<?php  echo $_SESSION['wrong_password']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['wrong_password']); ?> 



<!-- SIGN UP SUCCESS ALERT -->
<?php if(isset($_SESSION['user_not_found'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '<?php echo $_SESSION['user_not_found']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['user_not_found']); ?>

<?php include "inc/footer.php"; ?>