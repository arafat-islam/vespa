<?php
// session_start();



?>
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Form Validation</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link btnn" aria-current="page" href="index.php">Home</a>
        </li>

          <?php

          if(isset($_SESSION['logged_in'])) {
?>

        <li class="nav-item">
          <a class="nav-link btnn" href="users.php">User List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btnn" href="trash_users.php">View Trash Users' List</a>
        </li>

<?php 
       } ?>


<?php

if(!isset($_SESSION['logged_in'])) {
?>


  <li class="nav-item">
          <a class="nav-link btnn" href="login.php">Log In</a>
        </li>

<?php } ?>





<?php

if(isset($_SESSION['logged_in'])) {
?>


  <li class="nav-item">
          <a class="nav-link btnn btn btn-warning mr-2 text-white" href="logout.php">Log Out</a>
        </li>

<?php } ?>









      </ul>

    </div>
  </div>
</nav>
</nav>