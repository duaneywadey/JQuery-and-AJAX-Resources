<?php echo "string"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
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

	<div class="elementTest" style="color: red;">
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officiis inventore, iusto rerum at nemo accusantium totam quos sequi magnam sapiente nisi excepturi alias eum distinctio facere soluta quaerat incidunt fugit.
	</div>


	<button class="changeStyle">CHANGE STYLE</button>
	<script>
		$('.greatGrandparent').on('click', function (e) {
			alert($(this).find('.parenttwo .prm').text())
		})

		$('.elementTest').on('click', function (e) {
			alert($(this).attr('style'));
		})
	</script>
</body>
</html>