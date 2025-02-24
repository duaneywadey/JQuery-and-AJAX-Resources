<!DOCTYPE html>
<html>
  <head>
    <title>jQuery Form Example</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1>Processing an AJAX Form</h1>
            <div class="alert alert-danger emptyAlert d-none" role="alert">
              Please make sure the input fields are not empty
            </div>
            <div class="alert alert-info d-none" role="alert">
              <h4 class="nameAlert"></h4>
              <h4 class="emailAlert"></h4>
            </div>
            <form action="process.php" method="POST">
              <div id="name-group" class="form-group">
                <label for="name">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  name="name"
                  placeholder="Full Name"
                />
              </div>

              <div id="email-group" class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="email@example.com"
                />
              </div>

              <div id="superhero-group" class="form-group">
                <label for="superheroAlias">Superhero Alias</label>
                <input
                  type="text"
                  class="form-control"
                  id="superheroAlias"
                  name="superheroAlias"
                  placeholder="Ant Man, Wonder Woman, Black Panther, Superman, Black Widow"
                />
              </div>

              <button type="submit" class="btn btn-success">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
         <div class="card shadow" style="display:none;">
          <div class="card-body">
            <h1 class="nameJumb">Fluid jumbotron</h1>
            <h1 class="emailJumb">Fluid jumbotron</h1>
          </div>
        </div>
      </div>
    </div>

    <script>

		  $("form").submit(function (event) {
        event.preventDefault();

		    var formData = {
		      name: $("#name").val(),
		      email: $("#email").val(),
		      superheroAlias: $("#superheroAlias").val(),
		      testForm:1
		    };

        if (formData.name != "" && formData.email != "") {
          $.ajax({
            type: "POST",
            url: "process.php",
            data: formData,
            dataType: "json",
            success: function (data) {   
              $('.emptyAlert').addClass('d-none').hide().fadeIn();   
              $('.alert-info').removeClass('d-none').hide().fadeIn();      
              $('.nameAlert').text("Name: " + data.name);
              $('.emailAlert').text("Email: " + data.email);
              console.log(JSON.stringify(data));
            }
          })
        }
        else {
          $('.emptyAlert').removeClass('d-none').hide().fadeIn();
        }

		  });
		
    </script>
  </body>
</html>