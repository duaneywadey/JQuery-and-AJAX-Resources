<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<style>
		.modal-body {
			height: 500px;
			overflow: scroll;
		}

		.redBackground {
			background-color: yellow;
			color: red;
			font-family: "Papyrus";
			font-weight: bolder;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="alert alert-primary d-none" role="alert">
				  A simple primary alert—check it out!
				</div>
				<div class="alert alert-danger d-none" role="alert">
				  A simple primary alert—check it out!
				</div>
				<div class="card">
					<div class="card-body">
						<p class="firstName">Ivan</p>
						<p class="lastName">Duane</p>
						<p class="dateOfBirth">August 21, 2000</p>
						<button class="btn btn-info showModalBtn" data-toggle="modal" data-target="#exampleModal">Show modal</button>
						<button class="btn btn-primary cardBtn">Hello</button>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<p class="firstName">Ivan</p>
						<p class="lastName">Duane</p>
						<p class="dateOfBirth">August 21, 2000</p>
						<button class="btn btn-info showModalBtn" data-toggle="modal" data-target="#exampleModal">Show modal</button>
						<button class="btn btn-primary cardBtn">Hello</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<div class="card">
							<div class="card-body">
								Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dicta illo tenetur enim eveniet dignissimos, ullam rerum itaque nesciunt recusandae delectus dolorem consequatur sint soluta. Cum voluptas amet error fuga. Harum.
							</div>
						</div>
						<div class="float-right">
							<button class="addNewStyle">Add New</button>
							<button class="showDanger">Show Danger</button>
							<button class="showNormal">Show Normal</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form>
						<div class="form-group">
							<label for="date_posted">First Name</label>
							<input type="text" class="form-control firstName">
						</div>
						<div class="form-group">
							<label for="date_posted">Last Name</label>
							<input type="text" class="form-control lastName">
						</div>
						<div class="form-group">
							<label for="description">Date of birth</label>
							<input type="text" class="form-control dateOfBirth">
						</div>
					</form>
					<button class="btn btn-primary resetBtn">Reset</button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$('.showModalBtn').on('click', function (e) {
			var exampleModal = $('#exampleModal');

			$(exampleModal).find('.firstName').val(
				$(this).siblings('.firstName').text()
			);

			$(exampleModal).find('.lastName').val(
				$(this).siblings('.lastName').text()
			);

			$(exampleModal).find('.lastName').val(
				$(this).siblings('.lastName').text()
			);

			$(exampleModal).find('.dateOfBirth').val(
				$(this).siblings('.dateOfBirth').text()
			);
		})

		$('.showDanger').on('click', function (e) {
			$('.alert-primary').addClass("d-none");
			$('.alert-danger').removeClass("d-none");
		})

		$('.showNormal').on('click', function (e) {
			$('.alert-danger').addClass("d-none");
			$('.alert-primary').removeClass("d-none");
		})

		$('.addNewStyle').on('click', function (e) {
			$('.card').toggleClass("redBackground");
		})



	</script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

