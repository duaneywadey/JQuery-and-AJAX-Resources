<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
	<div class="formGroup">
		<input type="text" class="singleInputField">
	</div>
	<div class="letterHere" style="border-style: solid; font-family: 'Papyrus'; margin-top: 50px;">
	</div>
	<script>
	$('.letterHere').hide();
	$('.singleInputField').on('focus', function (e) {
		$(this).css({'width':'100%'});
	})

	$('.singleInputField').on('input', function (e) {
		if ($(this).val() == "") {
			$('.letterHere').hide();
		}
		else {
			$('.letterHere').show();
			$('.letterHere').text($(this).val());
		}
	})

	</script>
</body>
</html>