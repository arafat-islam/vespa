<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
    $query = "SELECT * FROM experience";

    $post = $db->select($query);
    
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
                    <h3 class="text-center text-light">Excperience Lists</h3>
                </div>
            </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $serial = 1;
                    if($post) :
                    while($row = $post->fetch_assoc()) : ?>
                    <tr>
                        <th scope="row"><?php echo $serial++; ?></th>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['description']; ?></td> 
                        <td><?php echo $row['date']; ?></td> 
                        <td><?php echo $row['designation']; ?></td> 
                        
                        <td><a href="editexperience.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                        <?php if(Session::get('userid') == $row['id'] || (Session::get('role') == 0)) : ?>
                        <td><a href="deleteexperience.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                        <?php endif;?>
                    <?php endwhile; ?>
                    <?php else : ?>
                        <td style="color:red">Nothing Found</td>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    
    
<?php if(isset($_SESSION['ex_updated'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['ex_updated']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['ex_updated']);?>
    
<?php if(isset($_SESSION['deleted'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['deleted']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['deleted']);?>
<?php if(isset($_SESSION['limit'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: '<?php echo $_SESSION['limit']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['limit']);?>
<?php if(isset($_SESSION['experience_added'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['experience_added']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['experience_added']);?>
<?php include "./inc/footer.php"; ?>