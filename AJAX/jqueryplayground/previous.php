<!DOCTYPE html>
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
	<!-- <button id="closestButton">Change color</button> -->
	<div class="outer">
		A
		<div class="inner">
			B
			<div class="children">
				<div>C</div>
				<div>D</div>
				<div class="child-E">E</div>
				<div>F</div>
				<div>G</div>
			</div>
		</div>
	</div>

	<div class="inputFields">
		<input type="text" class="inputField">
		<input type="text" class="fromHere inputField">
		<input type="text" class="inputField">
		<input type="text" class="inputField">
	</div>

	<button class="buttonTest">Try this!</button>
	<div class="groupOfDivs">
		<div class="divMember" style="margin-top: 50px; border-style: solid;">Lorem ipsum dolor, sit amet, consectetur adipisicing elit. Harum aliquam repellendus labore accusantium rem repellat quam officia ratione illum fuga veritatis nesciunt sit, libero modi, est! Magni sed voluptas, quis!</div>
		<div class="divMember" style="margin-top: 50px; border-style: solid;">Lorem ipsum dolor sit amet, consectetur adipisicing, elit. Cumque expedita molestias atque culpa, maiores est iusto nesciunt esse, corporis deserunt, libero maxime modi similique. Quam id accusamus at magnam natus.</div>
		<div class="divMember" style="margin-top: 50px; border-style: solid;">Lorem ipsum dolor sit, amet, consectetur adipisicing elit. Rem quas sunt temporibus, minima quam voluptatum pariatur mollitia adipisci explicabo enim esse blanditiis, iure iste excepturi accusantium possimus? Natus, beatae sunt.</div>
		<div class="divMember" style="margin-top: 50px; border-style: solid;">Lorem ipsum, dolor sit amet consectetur adipisicing, elit. Eius, possimus id aperiam modi repellendus tenetur molestias et asperiores repudiandae nihil, quaerat pariatur sequi cupiditate eligendi mollitia reprehenderit beatae blanditiis eum.</div>
		<div class="divMember" style="margin-top: 50px; border-style: solid;">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quod autem cum modi at, fuga rerum optio fugiat voluptatum veritatis corporis non, neque repellat recusandae minima quidem accusamus, culpa dolorum. Blanditiis!</div>
	</div>

	
	  
	  <div class="postGroup" data-postid = "1">
	  	<h1>Title</h1>
	  	<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
	  </div>

	  <div class="postGroup" data-postid = "2">
	  	<h1>Title</h1>
	  	<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
	  </div>

	  <div class="postGroup" data-postid = "2">
	  	<h1>Title</h1>
	  	<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
	  </div>

	  <div class="postGroup" data-postid = "2">
	  	<h1>Title</h1>
	  	<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
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

		})
	</script>	
</body>
</html>