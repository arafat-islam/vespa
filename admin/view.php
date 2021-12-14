<?php
include ("./dashboard_includes/header.php");
include "db.php";


if(!isset($_SESSION['logged_in'])) {
    header('location: login.php');
}

    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE ID = $id";

    $result = mysqli_query($conn, $query);

 


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
            <div class="card-header">
                <h3 class="text-center">Individual Users Details</h3>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>

                <?php
                    $serial = 1;
                    while($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td>Name: </td>
                    <td><?php echo $row['username']; ?></td>
                </tr>
                <tr>
                    <td>Email: </td>
                    <td><?php echo $row['email']; ?></td>

                </tr>
                <tr>
                    <td>Role: </td>
                    <td style="color: <?php if($row['user_role'] == 'admin') echo 'green';?>" >  <?php echo $row['user_role']; ?></td>

                </tr>
                <tr>
                    <td>Date</td>

                    <td><?php echo $row['created_at']; ?></td>
                </tr>

                </tr>
                <tr>
                    <td>Profile Image</td>
                        <?php if($row['profile_photo'] != '') { ?>
                    <td><img width="200" src="./uploads/images/<?php echo $row['profile_photo']; ?>" alt=""></td>
                    <?php } else { ?>
                        <td><h5 style="color:red">Missing Profile Photo<h5></td>

                        <?php } ?>
                </tr>
                <?php endwhile; ?>


            </thead>
            <tbody>



            </tbody>
        </table>
        <a class="btn btn-success" href="users.php">Go Back</a>
    </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    

    <?php include ("./dashboard_includes/footer.php"); ?>