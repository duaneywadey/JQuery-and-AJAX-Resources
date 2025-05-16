<?php require_once 'core/dbConfig.php'; ?>
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
        background-image: url("https://images.unsplash.com/photo-1464618663641-bbdd760ae84a?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
      }
  </style>
  <title>Hello, world!</title>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 p-5">
        <div class="card shadow">
          <div class="card-header">
            <h2>Welcome to Unsplash, Register Now!</h2>
          </div>
          <form action="core/handleForms.php" method="POST">
            <div class="card-body">
              <?php  
                if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

                  if ($_SESSION['status'] == "200") {
                    echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
                  }

                  else {
                    echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>"; 
                  }

                }
                unset($_SESSION['message']);
                unset($_SESSION['status']);
              ?>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" name="username" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="password" required>
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Confirm Password</label>
                <input type="password" class="form-control" name="confirm_password" required>
                <input type="submit" class="btn btn-primary float-right mt-4" name="insertNewUserBtn">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>