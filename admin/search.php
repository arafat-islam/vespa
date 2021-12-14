<?php
include("dashboard_includes/header.php");
    include "db.php";

    if(isset($_POST['search'])) {
        $val = $_POST['search_field'];

        $query = "SELECT * FROM users WHERE username LIKE '$val%' OR email LIKE '$val%'";

        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 0) {
            $_SESSION['search_not_found'] = "Sorry! Not Found";
            // header("location: search_view.php");
        } else {
            $_SESSION['search_found'] = "";
            // header("location: search_view.php");
        }
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
            <div class="card-header">
                <h5 class="text-center">Search Result</h5>
            </div>


            <?php
            if(isset($_SESSION['search_found'])) {
                ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                  while ($row = mysqli_fetch_assoc($result)) :?>
                    <tr style="background: #ddd">
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php endwhile; ?>


                </tbody>
            </table>
            <?php
            } unset($_SESSION['search_found']);
        ?>


            <?php
    if(isset($_SESSION['search_not_found'])) { 
      ?> <div>
                <small class="text-center text-danger"><?php echo $_SESSION['search_not_found']; ?></small>
            </div> <?php
    }
    unset($_SESSION['search_not_found']);
?>

        </div>

    </div>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    

    <?php include("dashboard_includes/footer.php");?>