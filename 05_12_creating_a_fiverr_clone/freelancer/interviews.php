<?php 
require_once 'core/dbConfig.php'; 

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if ($_SESSION['is_client'] == 1) {
  header("Location: ../client/index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <style>
      body {
        font-family: "Arial";
      }
    </style>
  </head>
  <body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container-fluid">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card shadow mt-4 p-4">
            <div class="card-body">
              <h3>Title here</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe dignissimos, sapiente laboriosam, optio voluptate eius temporibus accusamus sit doloribus itaque veniam voluptatibus eaque porro numquam in mollitia recusandae sequi minus.</p>
              <p>
                <i>Lorem Ipsum</i>
              </p>
              <h3>Time Start: </h3>
              <h3>Time End: </h3>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
