<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<nav class="navbar navbar-expand-lg navbar-dark p-4" style="background-color: #1e3F66;">
  <a class="navbar-brand" href="#">
    Unsplash Clone
    <?php if (isset($_SESSION['username'])) {
      echo ". Welcome, " . $_SESSION['username'] . "!";
    } 
    ?> 
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="submit_a_photo.php">Submit a Photo</a>
      </li>
      <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == '1') { ?>
      <li class="nav-item">
        <a class="nav-link" href="categories.php">
          Categories
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_accounts.php">
          All Accounts
        </a>
      </li> 
      <?php } ?>

      <?php if (isset($_SESSION['username'])) { ?>
      <li class="nav-item">
        <a class="nav-link" href="core/handleForms.php?logoutUserBtn=1">Logout</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>