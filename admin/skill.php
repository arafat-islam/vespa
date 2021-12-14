<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>
<?php
    $query = "SELECT * FROM skill";

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
                    <h3 class="text-center text-light">Skill Lists</h3>
                </div>
            </div>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Serial</th>
                        <th>Name</th>
                        <th>Percentage</th>
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
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['percentage']; ?></td>
                        <td><a class="btn btn-<?php echo $status = ($row['status']) ? "success" : "primary" ?>" href="<?php echo $status = ($row['status']) ? "deactiveskill" : "activeskill" ?>.php?id=<?php echo $row['id']; ?>"><?php echo $status = ($row['status']) ? "Active" : "Deactive"; ?></a></td>
                        <td><a href="editskill.php?id=<?php echo $row['id']; ?>">Edit</a></td>
                        <td><a href="deleteskill.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    <?php endwhile; ?>
                    <?php else : ?>
                        <td style="color:red">Nothing Found</td>
                    <?php endif; ?>

                </tbody>
            </table>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    
    
<?php if(isset($_SESSION['skill_deleted'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['skill_deleted']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['skill_deleted']);?>
    
<?php if(isset($_SESSION['skill_activated'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'success',
                title: '<?php echo $_SESSION['skill_activated']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['skill_activated']);?>
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
<?php if(isset($_SESSION['deactive'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'error',
                title: '<?php echo $_SESSION['deactive']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
<?php } unset($_SESSION['deactive']);?>
<?php include "./inc/footer.php"; ?>