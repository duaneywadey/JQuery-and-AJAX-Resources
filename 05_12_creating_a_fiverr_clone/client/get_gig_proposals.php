<?php 
require_once 'core/dbConfig.php'; 
require_once 'core/models.php'; 

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

if ($_SESSION['is_client'] == 0) {
  header("Location: ../freelancer/index.php");
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
      <div class="display-4 text-center">Gig Proposals. Double click to add interview</div>
      <div class="row justify-content-center">
        <?php $getGigById = getGigById($pdo, $_GET['gig_id']); ?>
        <div class="col-md-5">
          <div class="card shadow mt-4 p-4">
            <div class="card-header"><h4><?php echo $getGigById['gig_title']; ?> </h4></div>
            <div class="card-body">
              <p><?php echo $getGigById['gig_description']; ?></p>
              <p><i><?php echo $getGigById['date_added']; ?></i></p>
              <p><i><?php echo $_SESSION['username']; ?></i></p>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="card shadow mt-4 p-4">
            <div class="card-header"><h4>Interviews</h4></div>
            <div class="card-body">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Time Start</th>
                    <th scope="col">Time End</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $getAllInterviewsByGig = getAllInterviewsByGig($pdo, $_GET['gig_id']); ?>
                  <?php foreach ($getAllInterviewsByGig as $row) { ?>
                  <tr>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['time_start']; ?></td>
                    <td><?php echo $row['time_end']; ?></td>
                    <td>
                      <?php 
                        if ($row['status'] == "Accepted") {
                          echo "<span class='text-success'>Accepted</span>";
                        }
                        if ($row['status'] == "Rejected") {
                          echo "<span class='text-danger'>Rejected</span>";
                        } 
                        if ($row['status'] == "Pending") {
                          echo "Pending";
                        }
                      ?>  
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row justify-content-center p-4">
      <?php $getProposalsByGigId = getProposalsByGigId($pdo, $_GET['gig_id']); ?>
      <?php foreach ($getProposalsByGigId as $row) { ?>
      <div class="col-md-4 mt-4">
        <div class="card shadow gigProposalContainer p-4">
          <div class="card-body">
            <h2><?php echo $row['last_name'] . ", " . $row['first_name']; ?></h2>
            <p><?php echo $row['description']; ?></p>
            <form class="addNewInterviewForm d-none">
              <div class="form-group">
                <label for="time_start">Time Start</label>
                <input type="hidden" class="freelancer_id" value="<?php echo $row['user_id']; ?>">
                <input type="hidden" class="gig_id" value="<?php echo $_GET['gig_id']; ?>">
                <input type="datetime-local" class="time_start form-control">
              </div>
              <div class="form-group">
                <label for="time_end">Time End</label>
                <input type="datetime-local" class="time_end form-control">
                <input type="submit" class="btn btn-primary float-right mt-4">
              </div>
            </form>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
    <script>
      $('.gigProposalContainer').on('dblclick', function (event) {
        var addNewInterviewForm = $(this).find('.addNewInterviewForm');
        addNewInterviewForm.toggleClass('d-none');
      })

      $('.addNewInterviewForm').on('submit', function (event) {
        event.preventDefault();
        var formData = {
          freelancer_id: $(this).find('.freelancer_id').val(),
          gig_id: $(this).find('.gig_id').val(),
          time_start: $(this).find('.time_start').val(),
          time_end: $(this).find('.time_end').val(),
          insertNewGigInterview:1
        }

        if (formData.freelancer_id != "" && formData.gig_id != "" && formData.time_start != "" && formData.time_end != "") {
          $.ajax({
            type: "POST",
            url:"core/handleForms.php",
            data: formData,
            success:function (data) {
              if (data) {
                location.reload()
              }
              else {
                alert("You already added the user!")
              }
            }
          })
        }
        else {
          alert("Make sure no input fields are empty!")
        }
      })
    </script>
    <?php include 'includes/footer.php'; ?>
  </body>
</html>
