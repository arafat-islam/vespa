<?php
    include "./inc/header.php";
    include "./inc/sidebar.php";
?>
<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="container">

            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="text-center text-light">Users Lists</h3>
                </div>
            </div>

            


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th>Profile Image</th>
                        <th scope="col">Created At</th>
                        <th>Role</th>
                        <th scope="col" colspan="3" class='text-center'>Action</th>
                    </tr>
                </thead>
                <tbody>




                </tbody>
            </table>
        </div>



    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->





    <?php include "./inc/footer.php";?>



    <?php //if(isset($_SESSION['update_with_image'])) { ?>
    <!-- <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['update_with_image']; ?>',
                showConfirmButton: false,
                timer: 1500
                });

            </script> -->
    <?php //} unset($_SESSION['update_with_image']);?>



    <?php //if(isset($_SESSION['update_without_image'])) { ?>
    <!-- <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['update_without_image']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script> -->
    <?php //} unset($_SESSION['update_without_image']);?>



    <?php //if(isset($_SESSION['moved_to_trash'])) { ?>
    <!-- <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['moved_to_trash']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script> -->
    <?php //} unset($_SESSION['moved_to_trash']);?>