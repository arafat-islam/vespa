<?php
include "./dashboard_includes/header.php"; 

require "db.php";

if(!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}

    $query = "SELECT * FROM users WHERE delete_status = 0";

    $result = mysqli_query($conn, $query);

    
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

            
            <?php if(isset($_SESSION['deleted_successfully'])) { ?>
            <div class="alert alert-warning mt-3">
                <?php echo $_SESSION['deleted_successfully']; ?>
            </div>
            <?php } unset($_SESSION['deleted_successfully']) ;?>
      

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date</th>
                        <th>Profile Image</th>
                        <th>Role</th>
                        <th scope="col" colspan="3" class='text-center'>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $serial = 1;
                    while($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row"><?php echo $serial++; ?></th>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['created_at']; ?></td>
                        <td><img width="80" src="./uploads/images/<?php echo $row['profile_photo']; ?>" alt=""></td>
                        <td 
                            
                            style="color: <?php if($row['user_role'] == 'admin') {
                                echo "green";

                            } else if ($row['user_role'] == 'editor') {
                                echo "blue";
                            }
                            
                            ?>"
                        
                        ><?php echo $row['user_role']; ?></td>

                        
                        <!-- <?php //if($row['read_status'] == 0): ?>
                        <td><a style="text-decoration: none; font-size: 15px;"
                                href="mark_read.php?id=<?php //echo $row['id']; ?>">Mark As
                                Read</a></td>
                        <?php //else : ?>

                        <td><a style="text-decoration: none" href="mark_unread.php?id=<?php //echo $row['id']; ?>">Mark As
                                Unread</a></td>
                        <?php //endif; ?> -->
                        

                        <td><a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Details</a></td>


                        <?php if($user['user_role'] == 'admin' || $user['user_role'] == 'editor' && $user['id'] == $row['id']) : ?> 
                        <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a></td>
                        <?php endif; ?>

                        <?php if($user['id'] != $row['id']) : ?>


                            <td><button disabled href="#">Edit</button></td>

                            <?php endif;?>

                        <?php if($user['user_role'] == 'admin') : ?> 
                        <td><a href="soft_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"
                                <?php echo $row['id']; ?>">Delete</a></td>
                        <?php endif; ?>
                    </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>



    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


   


    <?php include "./dashboard_includes/footer.php";?>



    <?php if(isset($_SESSION['update_with_image'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['update_with_image']; ?>',
                showConfirmButton: false,
                timer: 1500
                });

            </script>
        <?php } unset($_SESSION['update_with_image']);?>



        <?php if(isset($_SESSION['update_without_image'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['update_without_image']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
        <?php } unset($_SESSION['update_without_image']);?>

        

        <?php if(isset($_SESSION['moved_to_trash'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['moved_to_trash']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
        <?php } unset($_SESSION['moved_to_trash']);?>


        