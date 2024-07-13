i<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<style>
		body {
			font-family: 'Arial';
			font-size: 2em;
		}

		button {
			font-size: 2em;
			margin-top: 10px;
			height: auto;
			width: auto;
		}
		.outer {
			background-color: lightblue;
			width: 800px;
			height: 800px;
			border-style: solid;
			margin: auto;

		}
		.inner {
			background-color: pink;
			width: 600px;
			height: 600px;
			border-style: solid;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
		}

		.children {
			background-color: MediumSeaGreen;
			width: 400px;
			height: 400px;
			border-style: solid;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);
			display: flex;
			justify-content: center;
		}

		.children div{
			background-color: yellow;
			width: 100px;
			height: 300px;
			border-style: solid;
			margin: 10px;
		}

		.postGroup {
			margin-top: 50px;
			border-style: solid;
		}

	</style>
</head>
<body>
	<div class="container">
		<div class="postGroup" data-postid = "1">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">1 - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
		</div>

		<div class="postGroup" data-postid = "2">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">2- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
		</div>

		<div class="postGroup" data-postid = "3">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">3 - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
		</div>

		<div class="postGroup" data-postid = "4">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">4 - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
		</div>
	</div>

	<script>
		$(document).ready(function () {

			// $('.child-E').siblings().css('background', 'red');
			// $('.child-E').next().css('background', 'red');
			// $('.child-E').nextAll().css('background', 'red');
			// $('.child-E').prev().css('background', 'red');
			// $('.child-E').prevAll().css('background', 'red');
			// $('.fromHere').nextAll().css('color', 'red');

			$('.buttonTest').on('click', function (e) {
				$('.groupOfDivs').each(function (e) {
					$(this).find('.divMember').css('background', 'red')
				})
				var dataTest = $("#getThis").data("postid");
				console.log(dataTest);
			})
			
			$('.showID').on('click', function (e) {
				var postid = $(this).closest('div').data('postid');
				var pTag = $(this).next().text();

				$.ajax({
					url:'form.php',
					method:'POST',
					data: {
						showID: 1,
						postid: postid,
						pTag: pTag
					},
					dataType: 'text',
					success: function (data) {
						console.log(data);
					}
				})
			})

		})
	</script>	
</body>
</html>