<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" style="border-style: solid; margin-top: 10px; padding: 25px;">
		<div class="mainParent">
		  <div class="textHere">A CHILD content...</div>
		</div>
		<div class="parent">
			<input type="text" class="randTextInput">
			<button class="saveBtn">sAVE</button>
		</div>
	</div>

	<div class="container" style="border-style: solid; margin-top: 10px; padding: 25px;">
		<div class="mainParent">
		  <div class="textHere">A CHILD content...</div>
		</div>
		<div class="parent">
			<input type="text" class="randTextInput">
			<button class="saveBtn">sAVE</button>
		</div>
	</div>


	<div class="container" style="border-style: solid; margin-top: 10px; padding: 25px;">
		<div class="mainParent">
		  <div class="textHere">A CHILD content...</div>
		</div>
		<div class="parent">
			<input type="text" class="randTextInput">
			<button class="saveBtn">sAVE</button>
		</div>
	</div>

	<script>
		$('.saveBtn').on('click', function (e) {
			$(this).closest('.parent').siblings('.mainParent').find('.textHere').text($(this).siblings('.randTextInput').val());
		})
	</script>
</body>
</html>