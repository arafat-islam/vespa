<?php 
include "inc/header.php"; 

?>
<?php include "inc/sidebar.php"; ?>



    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <span class="breadcrumb-item active">Welcome</span>
      </nav>

      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Hello</h5>
          <h3><?= Session::get('name'); ?></h3>
        </div><!-- sl-page-title -->

      </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





<!-- SIGN UP SUCCESS ALERT -->
<?php if(isset($_SESSION['login_successfully'])) { ?>
<script>
  Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: '<?php echo $_SESSION['login_successfully']; ?>',
  showConfirmButton: false,
  timer: 1500
})
</script>
<?php } unset($_SESSION['login_successfully']); ?>

<?php include "inc/footer.php"; ?>