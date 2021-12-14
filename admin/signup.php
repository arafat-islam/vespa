<?php include "inc/header.php";  ?>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

  <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
    <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">VESPA <span class="tx-info tx-normal">admin</span></div>
    <div class="tx-center mg-b-60">REGISTRATION</div>

    <form action="action/signup.php" method="post">
      
    <div class="form-group">
        <input type="text" name="name" class="form-control" placeholder="Enter your fullname">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Enter your username">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="text" name="email" class="form-control" placeholder="Enter your Email">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="password" name="password" class="form-control" placeholder="Enter your password">
      </div><!-- form-group -->
      <div class="form-group">
        <input type="password"  name="cpassword" class="form-control" placeholder="Confirm your password">
      </div><!-- form-group -->
      <input type="submit" name="submit" class="btn btn-info btn-block"/>
    </form>

    <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign In</a></div>
  </div><!-- login-wrapper -->
</div><!-- d-flex -->

<!-- SIGN UP SUCCESS ALERT -->
<?php if(isset($_SESSION['signup_successfully'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?php echo $_SESSION['signup_successfully']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['signup_successfully']); ?>

<!-- SIGN UP Failed ALERT -->
<?php if(isset($_SESSION['signup_failed'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '<?php echo $_SESSION['signup_failed']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['signup_failed']); ?>

<!-- USER EXIST -->
<?php if(isset($_SESSION['user_exist'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '<?php echo $_SESSION['user_exist']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['user_exist']); ?>

<!-- Password Mismatch ALERT -->
<?php if(isset($_SESSION['password_mitchmatch'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '<?php echo $_SESSION['password_mitchmatch']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['password_mitchmatch']); ?>


<!-- Empty Field ALERT -->
<?php if(isset($_SESSION['empty_field'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'error',
  title: '<?php echo $_SESSION['empty_field']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['empty_field']); ?>

<?php include "inc/footer.php"; ?>