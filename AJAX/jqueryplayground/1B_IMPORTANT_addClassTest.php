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

		.redStyle {
			color: red;
			background-color: yellow;
			border-style: solid;
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

	<div class="checkboxes">
		<p>
			<label for="">Sure?</label>
			<input type="radio" class="radioButton" value="one">
		</p>
		<p>
			<label for="">Sure?</label>
			<input type="radio" class="radioButton" value="two">
		</p>
		<p>
			<label for="">Sure?</label>
			<input type="radio" class="radioButton" value="three">
		</p>
		<p>
			<label for="">Sure?</label>
			<input type="radio" class="radioButton" value="four">
		</p>
		<p>
			<label for="">Sure?</label>
			<input type="radio" class="radioButton" value="five">
		</p>
	</div>


	<button class="slideUp">SLIDE UP</button>

	<div class="choices"></div>

	<div class="randomContent" style="border-style: solid;">
		<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure odio iste maxime quas quae earum ducimus, laborum veniam cupiditate impedit consequatur, quo dolore minima sint totam reprehenderit! Iure in, cum.</p>
	</div>

	<script>
		var choices = []
		$('.parenttwo').on('click', function (e) {

			if (!$(this).hasClass('redStyle')) {
				$(this).addClass('redStyle');
			}
			else {
				$(this).removeClass('redStyle');
			}

		})

		$('.radioButton').on('change', function (e) {
			choices.push($(this).val());
			for (var i = 0; i<=choices.length; i++) {
				$('.choices').append(choices[i]);
			}
		})

		$('.slideUp').on('click', function (e) {
			$('.randomContent').fadeToggle();
		})

	</script>
</body>
</html>