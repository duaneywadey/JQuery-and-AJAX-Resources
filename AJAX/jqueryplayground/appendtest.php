<?php echo "string"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>

	<div class="greatGrandparent">
		From greatgrandparent
		<div class="grandparent">
			From grandparent
			<div class="parent">
				From parent
				<div class="parenttwo">
					<div class="child">
						Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam quia temporibus sed omnis animi quae quas suscipit, cupiditate sit doloremque obcaecati rerum accusantium perferendis at eius, architecto dolorem voluptates inventore.
					</div>
				</div>
				<div class="parenttwo prm">
					<div class="child">
						ONLY THIS Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam quia temporibus sed omnis animi quae quas suscipit, cupiditate sit doloremque obcaecati rerum accusantium perferendis at eius, architecto dolorem voluptates inventore.
					</div>
				</div>
				<div class="parenttwo prm">
					<div class="child">
						ONLY THIS Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nam quia temporibus sed omnis animi quae quas suscipit, cupiditate sit doloremque obcaecati rerum accusantium perferendis at eius, architecto dolorem voluptates inventore.
					</div>
				</div>
			</div>
		</div>
	</div>

	<button class="changeStyle">CHANGE STYLE</button>
	<script>
		$('.greatGrandparent').on('click', function (e) {
			alert($(this).find('.parenttwo .prm').text())
		})
	</script>
</body>
</html>