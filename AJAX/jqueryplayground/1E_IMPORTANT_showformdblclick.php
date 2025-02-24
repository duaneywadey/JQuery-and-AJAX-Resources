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
				<p><textarea rows="5" cols="20" class="inputBody"></textarea></p>
				<button class="saveBtn">Save</button>
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
				<p><textarea rows="5" cols="20" class="inputBody"></textarea></p>
				<button class="saveBtn">Save</button>
				<button class="showTextContent">Show Text</button>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
		    // Enable editing on double-click
		    $('.textContent').on('dblclick', function () {
		        // Hide the text content
		        $(this).hide();
		        
		        // Show the input fields
		        const inputField = $(this).siblings('.inputField');
		        inputField.show();
		        
		        // Populate input fields with current text
		        inputField.find('.inputTitle').val($(this).find('.headingOne').text());
		        inputField.find('.inputBody').val($(this).find('.bodyText').text());
		    });

		    $('.saveBtn').on('click', function (e) {
		        // Hide the input fields
		        $(this).closest('.inputField').hide();
		        
		        // Get the title and body text from the input fields
		        const title = $(this).closest('.inputField').find('.inputTitle').val();
		        const body = $(this).closest('.inputField').find('.inputBody').val();
		        
		        // Set the text content with the new values
		        $(this).closest('.textPanel').find('.textContent').find('.headingOne').text(title);
		        
		        $(this).closest('.textPanel').find('.textContent').find('.bodyText').text(body);

		        // Show the text content again
		        $(this).closest('.textPanel').find('.textContent').show();
		    });
		});
	</script>
</body>
</html>