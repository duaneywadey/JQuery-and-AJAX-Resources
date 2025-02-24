<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<style>
		.highlighted {
			background-color: yellow;
		}
	</style>
</head>
<body>
	<ul class="items">
	</ul>

	<div class="contents">
		<div class="content active">number 1 - Number 1 Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed nihil sunt dignissimos nostrum voluptatem quas, a. Possimus, beatae officiis harum. Veritatis, voluptatum autem. Doloribus, odio. Tenetur et maiores optio id.</div>
		<div class="content">number 2 - Lorem ipsum dolfsfsfsor sit amet consectetur adipisicing elit. Sed nihil sunt dignissimos nostrum voluptatem quas, a. Possimus, beatae officiis harum. Veritatis, voluptatum autem. Doloribus, odio. Tenetur et maiores optio id.</div>
		<div class="content">number 3 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed nihil sunt dignissimos nostrum voluptatem quas, a. Possimus, beatae officiis harum. Veritatis, voluptatuhffhhfm autem. Doloribus, odio. Tenetur et maiores optio id.</div>
	</div>

	<div class="showHere" style="border-style: solid; font-size: 1.5em; background-color: gray;">
	</div>
	<script>
		let items = ['Apples', 'Oranges', 'Mangoes']
		$(items).each(function () {
			$('.items').append("<li>" + this + "</li>").on('click', "li", function (event) {
					$(this).toggleClass("highlighted");
				})
		});
		$('.showHere').hide()
		$('.content').on('click', function (e) {
			$(this).siblings().removeClass("active")
			$(this).addClass("active")
			$('.showHere').hide().fadeIn().show().text($(this).text());
		})

	</script>
</body>
</html>