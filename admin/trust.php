<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
    $query = "SELECT * FROM trust";

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
                    <h3 class="text-center text-light">Trust Lists</h3>
                </div>
            </div>

            
      

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col" class='text-center'>Experience</th>
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
                        <td><?php echo substr($row['description'], 0, 80); ?></td>
                        <td><?php echo $row['experience']; ?></td>
                        <td><a href="edittrust.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                        <?php if(Session::get('userid') == $row['id'] || (Session::get('role') == 0)) : ?>
                        <td><a href="deletetrust.php?id=<?php echo $row['id']; ?>">Delete</a></td>
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

    
    
<?php if(isset($_SESSION['trust_deleted'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['trust_deleted']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['trust_deleted']);?>
    

<?php include "./inc/footer.php"; ?>