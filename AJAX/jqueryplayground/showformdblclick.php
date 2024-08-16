<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="textBody">
		<div class="textPanel" style="border-style: solid; width: 50%;">
			<div class="textContent">
				<h1 class="headingOne">Title</h1>
				<p class="bodyText">Lorem ipsum dolor sit amet consectetur adipisicing, elit. Molestiae sapiente, accusantium, alias voluptas veritatis perferendis itaque culpa optio amet deleniti sed dolorum tempora in, aspernatur nesciunt vel labore autem eveniet.</p>
			</div>
			<div class="inputField" style="display: none;">
				<input type="text" class="inputTitle">
				<input type="text" class="inputBody">
			</div>
		</div>
	</div>
	<script>	
		$('.textPanel').on('dblclick', function (e) {
			$(this).find('.textContent').hide();
			$(this).find('.inputField').css({'display':'block'});
			$(this).find('.inputField').find('.inputTitle').val(
				$(this).find('.textContent').find('.headingOne').text()
			);
			$(this).find('.inputField').find('.inputBody').val(
				$(this).find('.textContent').find('.bodyText').text()
			);
		})

	</script>
</body>
</html>