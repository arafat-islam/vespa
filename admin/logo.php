<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
    $query = "SELECT * FROM logo";

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
                    <h3 class="text-center text-light">Logo Lists</h3>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                  
                        <th scope="col">Image</th>
                        <th scope="col">Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $serial = 1;
                    if($post) :
                    while($row = $post->fetch_assoc()) : ?>
                    <tr>
                        <th scope="row"><?php echo $serial++; ?></th>
         
                        <td><img width="100" src="../img/logo/<?php echo $row['image']; ?>" alt=""></td>
                        <td><a class="btn btn-<?php echo $status = ($row['status']) ? "success" : "primary" ?>" href="activelogo.php?id=<?php echo $row['id']; ?>"><?php echo $status = ($row['status']) ? "Active" : "Deactive"; ?></a></td>
                        <td><a href="deletelogo.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    <?php endwhile; ?>
                    <?php else : ?>
                        <td style="color:red">Nothing Found</td>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    
    
<?php if(isset($_SESSION['logo_added'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['logo_added']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['logo_added']);?>
    
<?php if(isset($_SESSION['logo_deleted'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['logo_deleted']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['logo_deleted']);?>

<?php if(isset($_SESSION['logo_activated'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['logo_activated']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['logo_activated']);?>

<?php if(isset($_SESSION['active_logo'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: '<?php echo $_SESSION['active_logo']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['active_logo']);?>
<?php include "./inc/footer.php"; ?>