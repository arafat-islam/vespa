<?php
include "./dashboard_includes/header.php";

include "db.php";
if(!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}


    $query = "SELECT * FROM users WHERE delete_status = 1";

    $result = mysqli_query($conn, $query);

    if(!isset($_SESSION['logged_in'])) {
        header('location: login.php');
    }

?>


<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <h1></h1>
        <div class="container">

            <div class="card">
                <div class="card-header" style="background-color: #e67e22">
                    <h3 class="text-center text-light">Trash Users' Lists</h3>
                </div>
            </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Profile Image</th>
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
                        <td><?php //echo $row['created_at']; ?></td>



                        


                        <?php if($row['profile_photo'] != '') { ?>
                            <td><img width="80" src="./uploads/images/<?php echo $row['profile_photo']; ?>" alt=""></td>
                    <?php } else { ?>
                        <td><h5 style="color:red">Missing Profile Photo<h5></td>

                        <?php } ?>


                        <td><a href="undo_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Restore</a>
                        </td>
                        <td><a id="detele_button" href="permanent_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                                    </tr>
                    <?php endwhile; ?>

                </tbody>
            </table>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <?php include "./dashboard_includes/footer.php";?>


    <script>
        var delete_btn = document.querySelectorAll('#detele_button');

        delete_btn.forEach(function(btn) {
            btn.addEventListener('click', function(e){
                e.preventDefault();
                const href = this.getAttribute('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.location.href = href;
                    } 
                });
            })
        });
    </script>


<?php if(isset($_SESSION['permanent_delete'])) { ?>
    <script>
        Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )

    </script>
<?php } unset($_SESSION['permanent_delete']);?>


<?php if(isset($_SESSION['restored_success'])) { ?>
    <script>
        Swal.fire({
        position: 'center',
        icon: 'success',
        title: '<?php echo $_SESSION['restored_success']; ?>',
        showConfirmButton: false,
        timer: 1500
        });

    </script>
<?php } unset($_SESSION['restored_success']);?>
