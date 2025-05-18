<?php  require_once 'core/dbConfig.php'; ?>
<?php  require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en-us">
<head>
  <meta charset="utf-8">
  <title>Lightbox Example</title>
  <?php include 'includes/header.php'; ?>
</head>
<body>
  <?php include 'includes/navbar.php'; ?>
  <div class="container">
    <h1 class="display-4 text-center">
      All Images
    </h1>
    <h1 class="display-4 text-center">
      <?php  
      if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

        if ($_SESSION['status'] == "200") {
          echo "<span class='text-success'>{$_SESSION['message']}</span>";
        }

        else {
          echo "<span class='text-danger'>{$_SESSION['message']}</span>"; 
        }

      }
      unset($_SESSION['message']);
      unset($_SESSION['status']);
    ?>
    </h1>
    <select name="#" id="" class="form-control categorySelectField">
      <option value="">Select Category Here</option>
      <?php $getAllCategories = getAllCategories($pdo); ?>
      <?php  foreach ($getAllCategories as $row) { ?>
        <option value="<?php echo $row['category_name'] ?>">
          <?php echo $row['category_name'] ?>    
        </option>
      <?php } ?>
    </select>
    <div class="row justify-content-center photoContainers">
      <?php $getAllPhotos = getAllPhotos($pdo); ?>
      <?php foreach ($getAllPhotos as $row) { ?>
      <div class="col-4 mt-4">
        <div class="card shadow" unsplash_photo_id="<?php echo $row['unsplash_photo_id']; ?>" photo_name="<?php echo $row['photo_name']; ?>">
          <div class="card-body">
            <a class="example-image-link" href="files/<?php echo $row['photo_name']; ?>" data-lightbox="example-set" data-title="<?php echo $row['photo_description']; ?>"><img class="example-image img-fluid" src="files/<?php echo $row['photo_name']; ?>" alt="" /></a>

            <?php if (isset($_SESSION['username']) && $_SESSION['user_id'] == $row['user_id']) { ?>
              <button class="btn btn-danger mt-4 float-right deletePhotoBtn">Delete <i class="fa fa-trash" aria-hidden="true"></i></button>
            <?php } ?>

            <h5><?php echo $row["photo_description"]; ?></h5>
            <h6><?php echo $row["username"]; ?></h6>
            <h6><?php echo $row["category_name"]; ?></h6>
            <p><i><?php echo $row["date_added"]; ?></i></p>
          </div>
        </div>
      </div>
      <?php } ?>
    </div>
  </div>
  <?php include 'includes/footer.php'; ?>
  <script>
    $('.categorySelectField').on('change', function (event) {
      $.ajax({
        type:"POST",
        url:"core/handleForms.php",
        data: {
          category_name: $(this).val(),
          showImagesByCategory: 1
        },
        success: function (data) {
          $('.photoContainers').html(data);
        }
      })
    })
    $('.deletePhotoBtn').on('click', function (event) {
      event.preventDefault();
      var cardElement = $(this).closest('.card');
      if (confirm("Are you sure you want to delete this photo?")) {
        $.ajax({
          type:"POST",
          url:"core/handleForms.php",
          data: {
            unsplash_photo_id: cardElement.attr('unsplash_photo_id'),
            photo_name: cardElement.attr('photo_name'),
            deletePhoto:1 
          },
          success: function (data) {
            cardElement.fadeOut();
            setTimeout(function() {
              location.reload();
            }, 1000);
          }
        })
      }
    })
  </script>
</body>
</html>
