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
                    <?php
                        $query = "SELECT * FROM users";
                        $post = $db->select($query);
                        $serial = 0;
                        if($post) {
                        while($users = $post->fetch_assoc()) {
                     ?>
                    <tr>
                        <td><?= ++$serial; ?></td>
                        <td><?= $users['name'];?></td>
                        <td><?= $users['email'];?></td>
                        <td><img src="../img/users/<?= $users['image'];?>" width="100" alt=""></td>
                        <td><?= $users['created_at'];?></td>
                        <td><?php 
                            if ($users['role'] == 0) {
                                echo "Admin"; 
                        } elseif ($users['role'] == 1) {
                            echo "Editor";
                        }
                        
                        ?></td>


                        <?php if(Session::get('userid') == $users['id'] || (Session::get('role') == 0)) :?>

                        <td><a href="deleteuser.php?id=<?= $users['id'];?>" class="btn btn-danger"
                                onclick="return confirm('Are You Sure?');">Delete</a></td>
                    </tr>
                    <?php endif;?>

                    <?php } } ?>
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



    <?php if(isset($_SESSION['user_deleted'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?php echo $_SESSION['
            user_deleted ']; ?>',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['user_deleted']);?>