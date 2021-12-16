<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}


$query = "SELECT * FROM social";

$post = $db->select($query);
if($post) {
  $result = $post->fetch_assoc();



?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <h1>Social Links</h1>
        <form action="action/editsocial.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <label for="title">Facebook</label>
                    <input value="<?php echo $result['facebook']; ?>" name="facebook" type="text" class="form-control" id="title">
                </div>
             <div class="col-md-12">
                    <label for="title">Twitter</label>
                    <input value="<?php echo $result['twitter']; ?>" name="twitter" type="text" class="form-control" id="title">
                </div>
                <div class="col-md-12">
                    <label for="title">LinkedIn</label>
                    <input value="<?php echo $result['linkedin']; ?>" name="linkedin" type="text" class="form-control" id="title">
                </div>
                <div class="col-md-12">
                    <label for="title">Instagram</label>
                    <input value="<?php echo $result['instagram']; ?>" name="instagram" type="text" class="form-control" id="title">
                </div>
            </div>
            <input class="btn btn-primary mt-3" name="submit" type="submit" value="Edit Social Links">
        </form>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php } ?>

<!-- SIGN UP SUCCESS ALERT -->
<?php if(isset($_SESSION['social_updated'])) { ?>
<script>
Swal.fire(
  'Success',
  'Social Links Updated Successfully',
  'success'
)
</script>
<?php } unset($_SESSION['social_updated']); ?>



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