<?php
include("./dashboard_includes/header.php");

?>

<!-- ########## START: MAIN PANEL ########## -->
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="">Dashboard</a>
    </nav>

    <div class="sl-pagebody">
        <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

            <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
                <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Vespa <span
                        class="tx-info tx-normal">Register</span></div>

                <form action="post.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="text" name="username" id="name" placeholder="Enter your name"
                            value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>"
                            class="form-control">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="email" name="email" id="email" placeholder="Enter your email"
                            value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>"
                            class="form-control">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Enter your password"
                            value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>"
                            class="form-control password">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input type="password" name="confirm_password" placeholder="Enter password again to confirm"
                            class="form-control" placeholder="Reenter Password"
                            value="<?php echo isset($_SESSION['confirm_password']) ? $_SESSION['confirm_password'] : ''; ?>">
                    </div><!-- form-group -->
                    <div class="form-group">
                        <input class="form-control" type="file" name="profile_photo" id="profile_photo">
                    </div><!-- form-group -->

                    <div class="row mb-3">
                            <div class="col-sm-12 mg-t-20 mg-sm-t-0">
                                <select name="user_role" class="form-control select2" data-placeholder="Country">
                                    <option label="Role"></option>
                                    <option value="admin">Administrator</option>
                                    <option value="editor">Editor</option>
                                    <option value="author">Author</option>
                                    <option value="contributor">Contributor</option>
                                </select>
                            </div><!-- col-4 -->
                        </div>

                    <div class="form-group">
                        <label class="d-block tx-11 tx-uppercase tx-medium tx-spacing-1">Birthday</label>
                        <div class="row row-xs">
                            <div class="col-sm-4">
                                <select name="month" class="form-control select2" data-placeholder="Month">
                                    <option label="Month"></option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div><!-- col-4 -->
                            <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                                <select name="day" class="form-control select2" data-placeholder="Day">
                                    <option label="Day"></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div><!-- col-4 -->
                            <div class="col-sm-4 mg-t-20 mg-sm-t-0">
                                <select name="year" class="form-control select2" data-placeholder="Year">
                                    <option label="Year"></option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                </select>
                            </div><!-- col-4 -->
                        </div><!-- row -->
                        <div class="row">
                            <div class="col-sm-12 mg-t-20 mg-sm-t-0">
                                <select name="country" class="form-control select2" data-placeholder="Country">
                                    <option label="Country"></option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Arab">Arab</option>
                                    <option value="India">India</option>
                                    <option value="USA">USA</option>
                                </select>
                            </div><!-- col-4 -->
                        </div>
                    </div><!-- form-group -->
                    <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy
                        and
                        terms of use of our website.</div>
                    <button type="submit" class="btn btn-info btn-block">Sign Up</button>
                </form>
                <div class="mg-t-40 tx-center">Already have an account? <a href="login.php" class="tx-info">Sign
                        In</a></div>
            </div><!-- login-wrapper -->
        </div><!-- d-flex -->

    </div><!-- sl-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->


    <?php include("./dashboard_includes/footer.php");?>


    <?php if(isset($_SESSION['file_size_limit'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'warning',
            title: 'File Site Too Large! ',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['file_size_limit']);?>


    <?php if(isset($_SESSION['user_already_exist'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'info',
            title: 'Username Already Exist!',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['user_already_exist']);?>



    <?php if(isset($_SESSION['empty'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: '<?php echo $_SESSION['
            empty ']; ?>',
            showConfirmButton: false,
            timer: 1800
        });
    </script>
    <?php } unset($_SESSION['empty']);?>



    <?php if(isset($_SESSION['signup_success_message'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Sign Up Successfully',
            showConfirmButton: false,
            timer: 1000
        });
    </script>
    <?php } unset($_SESSION['signup_success_message']);?>

    <?php if(isset($_SESSION['password_missmatch'])) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Passwrd doesnot matched!',
            showConfirmButton: false,
            timer: 1500
        });
    </script>
    <?php } unset($_SESSION['password_missmatch']);?>