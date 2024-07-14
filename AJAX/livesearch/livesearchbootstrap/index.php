<?php require_once 'backend-search.php'; ?>
<!doctype html>
  <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  </head>
  <body>
    <div class="container">
      <div class="text-center">
        <h1>Live Search test</h1>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-6">
          <input type="text" class="form-control" id="searchInput">
        </div>
      </div>
      <div class="row mt-4 searchResults">
        <?php $allUsers = selectAllUsers($pdo); ?>
        <?php foreach ($allUsers as $row) { ?>
          <div class='col-md-4 mt-4'>
            <div class='card'>
              <div class='card-body'>
                <h1><?php echo $row['username']; ?></h1>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <script>
   $(document).ready(function () {
      $('#searchInput').on('input', function (e) {
        var searchInput = $(this).val();
        if (searchInput.length) {
          $.ajax({
            method: 'GET',
            url: 'backend-search.php',
            data: {searchInput: searchInput}
          }).done(function (data) {
            $('.searchResults').html(data);
          });
        } 
        else {
          $.ajax({
            method: 'GET',
            url: 'backend-search.php',
            data: {searchInput: ''}
          }).done(function (data) {
            $('.searchResults').html(data);
          });
        }
      });
  });

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/
    bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    
  </body>
  </html>