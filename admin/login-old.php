<?php
include "session.php";
include("header.php");
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
    <link href="./dashboard_assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="./dashboard_assets/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <link href="./dashboard_assets/lib/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="./dashboard_assets/css/starlight.css">
</head>

<body>
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span
                    class="tx-info tx-normal">admin</span></div>
            <div class="tx-center mg-b-60">Professional Admin Template Design</div>
            <form action="login_confirmation.php" method="post">
                <div class="form-group">

                    <input type="text" name="username" placeholder="Enter your username or email" id="username"
                        class="form-control">
                </div><!-- form-group -->
                <div class="form-group">
                    <input type="password" name="password" id="password" placeholder="Enter Your Password"
                        class="form-control">

                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div><!-- form-group -->
                <button type="submit" class="btn btn-info btn-block">Sign In</button>
            </form>
            <!-- <div class="mg-t-60 tx-center">Not yet a member? <a href="index.php" class="tx-info">Sign Up</a> -->
            </div>
        </div><!-- login-wrapper -->
    </div><!-- d-flex -->

    <script src="./dashboard_assets/lib/jquery/jquery.js"></script>
    <script src="./dashboard_assets/lib/popper.js/popper.js"></script>
    <script src="./dashboard_assets/lib/bootstrap/bootstrap.js"></script>
    <script src="./dashboard_assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="./dashboard_assets/js/starlight.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>

<!-- <div class="container">

    <div class="card">
        <div class="card-header" style="background: #2980b9">
            <h3 class="text-center text-light">Log In</h3>
        </div>
        <div>
            <div class="card-body">

                <form action="login_confirmation.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username Or Email</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control">

                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <small>Don't Have an Account?</small>
                <a href="index.php">Sign Up Here</a>
            </div>
        </div>
    </div>
</div> -->
<?php if(isset($_SESSION['logged_out'])) { ?>
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?php echo $_SESSION['
        logged_out ']; ?>',
        showConfirmButton: false,
        timer: 1500
    });
</script>
<?php } unset($_SESSION['logged_out']);?>


<?php if(isset($_SESSION['password_mitchmatch'])) { ?>
<script>
    Swal.fire({
        position: 'top-right',
        icon: 'error',
        title: '<?php echo $_SESSION['password_mitchmatch']; ?>',
        showConfirmButton: false,
        timer: 1500
    });
</script>
<?php } unset($_SESSION['password_mitchmatch']);?>




<?php if(isset($_SESSION['login_failed'])) { ?>
<script>
    Swal.fire({
        position: 'top-right',
        icon: 'error',
        //title: '<?php //echo $_SESSION['login_failed ']; ?>',
        title: "<?php echo $_SESSION['login_failed'];?>",
        showConfirmButton: false,
        timer: 2000
    });
</script>
<?php } unset($_SESSION['login_failed']);?>