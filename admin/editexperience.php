<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<?php

if(isset($_GET['id'])) {
    $id = $_GET['id'];
}


$query = "SELECT * FROM experience WHERE id = $id";

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
        <h1>Edit Experience</h1>
        <form action="action/editexperience.php?id=<?php echo $id;?>" method="post" >
            <div class="row">
                <div class="col-md-12">
                    <label for="title">title</label>
                    <input value="<?php echo $result['title']; ?>" name="title" type="text" class="form-control" id="title">
                </div>
                <div class="col-md-12">
                    <label for="description">Description</label>
                    <textarea type="text" class="form-control" name="description" cols="30" rows="10" id="description" ><?php echo $result['description']; ?></textarea>
                </div>
                <div class="col-md-12">
                    <label for="designation">Designation</label>
                    <input type="text" class="form-control" name="designation" id="designation" value="<?php echo $result['designation']; ?>" >
                </div>
            </div>
            <input class="btn btn-primary mt-3" name="submit" type="submit" value="Update Experience">
        </form>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

<?php } ?>

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