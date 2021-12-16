<?php include "inc/header.php"; ?>
<?php include "inc/sidebar.php"; ?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">

        <div class="col-md-8 m-auto">
            <form action="action/adduser.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <h3>Add User</h3>
                    <div class="col-md-12">
                        <label for="title">Username</label>
                        <input name="username" type="text" class="form-control" id="title">
                    </div>
                    <div class="col-md-12">
                        <label for="name">Full Name</label>
                        <input name="name" type="text" class="form-control" id="name">
                    </div>
                    <div class="col-md-12">
                        <label for="description">Email</label>
                        <input name="email" type="email" class="form-control" id="email">
                    </div>
                    <div class="col-md-12">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password">
                    </div>
                    <div class="col-md-12">
                        <label for="button">User Role</label>
                        <select class="form-control" name="role" id="role">
                            <option value="0">Admin</option>
                            <option value="1">Editor</option>
                        </select>
                    </div>
                    <div class="col-md-12">
                        <label for="profile_photo">Profile Photo</label>
                        <input type="file" class="form-control" name="image" id="">
                    </div>
                </div>
                <input class="btn btn-primary mt-3" name="submit" type="submit" value="Add User">
            </form>
        </div>
    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->



    <!-- SIGN UP SUCCESS ALERT -->
    <?php if(isset($_SESSION['user_added'])) { ?>
    <script>
        Swal.fire(
            'Success',
            'User Added Successfully',
            'success'
        )
    </script>
    <?php } unset($_SESSION['user_added']); ?>



    <?php if(isset($_SESSION['empty'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?php echo $_SESSION['empty']; ?>',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['empty']);?>


    <?php if(isset($_SESSION['user_exist'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?php echo $_SESSION['user_exist']; ?>',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['user_exist']);?>


    <?php include "inc/footer.php"; ?>