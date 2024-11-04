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
	</style>
</head>
<body>
	<div class="container groupOfDivs">
		<div class="postGroup" data-postid = "1">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">1 - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
			<div class="findMe">
				FINDME - Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, illum quae ducimus magnam assumenda quisquam id nulla pariatur, velit ab, ullam quos cupiditate. Tempore optio non voluptatibus saepe temporibus autem.
			</div>
		</div>

		<div class="postGroup" data-postid = "2">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">2- Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
			<div class="findMe">
				FINDME - Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, illum quae ducimus magnam assumenda quisquam id nulla pariatur, velit ab, ullam quos cupiditate. Tempore optio non voluptatibus saepe temporibus autem.
			</div>
		</div>

		<div class="postGroup" data-postid = "3">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">3 - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
			<div class="findMe">
				FINDME - Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, illum quae ducimus magnam assumenda quisquam id nulla pariatur, velit ab, ullam quos cupiditate. Tempore optio non voluptatibus saepe temporibus autem.
			</div>
		</div>

		<div class="postGroup" data-postid = "4">
			<h1>Title</h1>
			<button class="showID">Show ID</button>
			<p class="sampleText">4 - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur fugiat illo, ducimus, molestias cumque id! Odit sequi alias corporis quasi recusandae iste error quia aliquam pariatur aspernatur, officia, consequatur ipsa.</p>
			<div class="findMe">
				FINDME - Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis, illum quae ducimus magnam assumenda quisquam id nulla pariatur, velit ab, ullam quos cupiditate. Tempore optio non voluptatibus saepe temporibus autem.
			</div>
		</div>

		<div class="children">
			<button class="showChild">Show Child</button>
			<div class="child1">Child1</div>
			<div class="child2">Child2</div>
		</div>
	</div>

	<button class="buttonTest">BTN</button>

	<script>
		$(document).ready(function () {

			$('.buttonTest').on('click', function (e) {
				
				$('.groupOfDivs').each(function (e) {
					$(this).find('.divMember').css('background', 'red')
				})
				
			})
			
			$('.showID').on('click', function (e) {
			    var postid = $(this).closest('div').data('postid');
			    var findMe = $(this).siblings('.findMe').text();

			    $.ajax({
			        url: 'dataMethodForm.php',
			        method: 'POST',
			        data: {
			            showID: 1,
			            postid: postid,
			            findMe: findMe
			        },
			        dataType: 'text',
			        success: function (data) {
			        	alert(data);
			        }
			    });

			});

		})
	</script>	
</body>
</html>