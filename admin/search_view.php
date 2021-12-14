<?php
    session_start();
    include "db.php";

    if(isset($_POST['search'])) {
        $val = $_POST['search_field'];

        $query = "SELECT * FROM users WHERE username LIKE '$val%' OR email LIKE '$val%'";

        $result = mysqli_query($conn, $query);
        

    }

?>

<?php include "header.php";?>
    <div class="container">
        <?php include "navbar.php"; ?>


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
                    <tr>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                    <?php endwhile; ?>


                </tbody>
            </table>
            <?php
            }
        ?>


<?php
    if(isset($_SESSION['search_not_found'])) { 
      ?> <div>
          <h5 class="text-center"><?php echo $_SESSION['search_not_found']; ?></h5>
       </div> <?php
    }
    unset($_SESSION['search_not_found']);
?>

        </div>

    </div>


    <?php include "footer.php";?>