<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <h1>Add Project</h1>
        <form action="action/addproject.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <label for="title">Title</label>
                    <input name="title" type="text" class="form-control" id="title">
                </div>
                <div class="col-md-12">
                    <label for="branding">Branding</label>
                    <textarea class="form-control" name="branding" id="branding" cols="30" rows="10"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="title">Image</label>
                    <input name="image" type="file" class="form-control" id="title">
                </div>
               
            </div>
            <input class="btn btn-primary mt-3" name="submit" type="submit" value="Add Project">
        </form>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



<!-- SIGN UP SUCCESS ALERT -->
<?php if(isset($_SESSION['projects_added'])) { ?>
<script>
Swal.fire(
  'Success',
  'Projects Added Successfully',
  'success'
)
</script>
<?php } unset($_SESSION['projects_added']); ?>



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