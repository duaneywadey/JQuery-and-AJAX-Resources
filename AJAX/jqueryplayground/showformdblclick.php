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
		<div class="textPanel" style="border-style: solid; width: 50%; margin-top: 20px;">
			<div class="textContent">
				<h1 class="headingOne">Title</h1>
				<p class="bodyText">Lorem ipsum dolor sit amet consectetur adipisicing, elit. Molestiae sapiente, accusantium, alias voluptas veritatis perferendis itaque culpa optio amet deleniti sed dolorum tempora in, aspernatur nesciunt vel labore autem eveniet.</p>
			</div>
			<div class="inputField" style="display: none;">
				<p><input type="text" class="inputTitle"></p>
				<p><textarea rows="5" cols="20"class="inputBody"></textarea></p>
				<input type="submit" class="Save">
				<button class="showTextContent">Show Text</button>
			</div>
		</div>
		<div class="textPanel" style="border-style: solid; width: 50%; margin-top: 20px;">
			<div class="textContent">
				<h1 class="headingOne">Title</h1>
				<p class="bodyText">Lorem ipsum dolor sit amet consectetur adipisicing, elit. Molestiae sapiente, accusantium, alias voluptas veritatis perferendis itaque culpa optio amet deleniti sed dolorum tempora in, aspernatur nesciunt vel labore autem eveniet.</p>
			</div>
			<div class="inputField" style="display: none;">
				<p><input type="text" class="inputTitle"></p>
				<p><textarea rows="5" cols="20"class="inputBody"></textarea></p>
				<button class="saveBtn">Save</button>
				<button class="showTextContent">Show Text</button>
			</div>
		</div>
	</div>
	<script>	
		$('.textPanel').on('dblclick', function (e) {
			$(this).find('.textContent').toggle();
            $(this).find('.inputField').toggle();
			$(this).find('.inputField').find('.inputTitle').val(
				$(this).find('.textContent').find('.headingOne').text()
			);
			$(this).find('.inputField').find('.inputBody').val(
				$(this).find('.textContent').find('.bodyText').text()
			);
		})

		// $('.showTextContent').on('click', function (e) {
		// 	$('.textPanel').find('.textContent').show();
		// 	$('.textPanel').find('.inputField').hide();
		// })
	</script>
</body>
</html>