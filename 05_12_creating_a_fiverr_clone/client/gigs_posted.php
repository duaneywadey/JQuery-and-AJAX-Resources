<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if ($_SESSION['is_client'] == 0) {
  header("Location: ../employees/index.php");
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
      <div class="display-4 text-center">Gigs Posted. Double click to edit</div>
      <div class="row justify-content-center">
        <div class="col-md-8">
          <?php $getAllGigsByUserId = getAllGigsByUserId($pdo, $_SESSION['user_id']); ?>
          <?php foreach ($getAllGigsByUserId as $row) { ?>
          <div class="gigContainer card shadow mt-4 p-4">
            <div class="card-header"><h4><?php echo $row['title']; ?></h4></div>
            <div class="card-body">
              <p><?php echo $row['description']; ?></p>
              <p><i><?php echo $row['date_added'] ?></i></p>
              <p><i><?php echo $row['username'] ?></i></p>
              <a href="get_gig_proposals.php?gig_id=<?php echo $row['gig_id']; ?>" class="btn btn-primary float-right">See Gig Proposals</a>
              <form class="editGigForm mt-4 d-none">
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" value="<?php echo $row['title']; ?>" class="form-control title" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <input type="text" value="<?php echo $row['description']; ?>" class="form-control description" required>
                  <input type="submit" class="btn btn-primary float-right mt-4" required>
                </div>
              </form>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <?php include 'includes/footer.php'; ?>
    <script>
      $('.gigContainer').on('dblclick', function (event) {
        var editForm = $(this).find('.editGigForm');
        editForm.toggleClass('d-none');
      })
    </script>
  </body>
</html>
