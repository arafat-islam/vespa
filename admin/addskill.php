<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <h1>Add Trust</h1>
        <form action="action/addskill.php" method="post" >
            <div class="row">
                <div class="col-md-12">
                    <label for="name">Name</label>
                    <input name="name" type="text" class="form-control" id="name">
                </div>
                <div class="col-md-12">
                    <label for="percentage">Percentage</label>
                    <input type="text" class="form-control" name="percentage" id="percentage">
                </div>
            </div>
            <input class="btn btn-primary mt-3" name="submit" type="submit" value="Add Skill">
        </form>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



<!-- SIGN UP SUCCESS ALERT -->
<?php if(isset($_SESSION['skill_added'])) { ?>
<script>
Swal.fire(
  'Success',
  'Skill Added Successfully',
  'success'
)
</script>
<?php } unset($_SESSION['skill_added']); ?>



<?php if(isset($_SESSION['empty'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: '<?php echo $_SESSION['empty']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['empty']);?>


<?php include "inc/footer.php"; ?>