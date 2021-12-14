<?php

include("dashboard_includes/header.php");

require ("db.php");

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = $id";

if(!$result = mysqli_query($conn, $query)) {
    die(mysqli_connection_error());
} 

$row = mysqli_fetch_assoc($result);

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
            <div class="card-header" style="background: #9b59b6">
                <h3 class="text-center text-light">Update Information</h3>
            </div>
            <div>


                <?php if(isset($_SESSION['login_seccess'])) { ?>
                <div class="alert alert-success">
                    <?php echo $_SESSION['login_seccess']; ?>
                </div>
                <?php } unset($_SESSION['login_seccess']) ;?>


                <?php if(isset($_SESSION['user_already_exist'])) { ?>
                <div class="alert alert-danger">
                    <?php echo $_SESSION['user_already_exist']; ?>
                </div>
                <?php } unset($_SESSION['user_already_exist']) ;?>

                

            </div>
            <div class="card-body">
                <form action="update_information.php?id=<?php echo $row['id']; ?>" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="name"
                            value="<?php echo $row['username']?>"
                            class="form-control">
                        <?php if(isset($_SESSION['errors']['username'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['errors']['username']; ?>
                        </div>
                        <?php } unset($_SESSION['errors']['username']);?>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            value="<?php echo $row['email']?>"
                            class="form-control">
                        <?php if(isset($_SESSION['errors']['email'])) { ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['errors']['email']; ?>
                        </div>
                        <?php } unset($_SESSION['errors']['email']) ;?>
                    </div>
                    

                    <div class="mb-3">
                        <img width="100" src="./uploads/images/<?php echo $row['profile_photo'] ?>" alt="">
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Profile Photo</label>
                        <input class="form-control" type="file" name="profile_photo" id="profile_photo">
                    </div>

                    <div class="row mb-3">
                            <div class="col-sm-12 mg-t-20 mg-sm-t-0">
                                <select name="user_role" class="form-control select2" data-placeholder="Country">
                                    <option label="Role"></option>
                                    <option <?php if($row['user_role'] == 'admin') echo "selected"; ?> value="admin">Administrator</option>
                                    <option  <?php if($row['user_role'] == 'editor') echo "selected"; ?> value="editor">Editor</option>
                                    <option  <?php if($row['user_role'] == 'author') echo "selected"; ?> value="author">Author</option>
                                    <option  <?php if($row['user_role'] == 'contributor') echo "selected"; ?> value="contributor">Contributor</option>
                                </select>
                            </div><!-- col-4 -->
                        </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    
                </form>
                <a class="btn btn-danger" href="users.php">Cancel</button>
            </div>
        </div>
    </div>

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    





    <?php include("dashboard_includes/footer.php");?>

    <?php if(isset($_SESSION['file_size_limit'])) { ?>
            <script>
                Swal.fire({
                position: 'center',
                icon: 'warning',
                title: '<?php echo $_SESSION['file_size_limit']; ?>',
                showConfirmButton: false,
                timer: 1800
                });

            </script>
        <?php } unset($_SESSION['file_size_limit']);?>

    