<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <h1>Add Trust</h1>
        <form action="action/addtrust.php" method="post" >
            <div class="row">
                <div class="col-md-12">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="col-md-12">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                </div>
           
                <div class="col-md-12">
                    <label for="experience">Experience</label>
                    <input name="experience" type="text" class="form-control" id="experience">
                </div>
            </div>
            <input class="btn btn-primary mt-3" name="submit" type="submit" value="Add Banner">
        </form>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



<!-- SIGN UP SUCCESS ALERT -->
<?php if(isset($_SESSION['trust_added'])) { ?>
<script>
Swal.fire(
  'Success',
  'Trust Added Successfully',
  'success'
)
</script>
<?php } unset($_SESSION['trust_added']); ?>



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