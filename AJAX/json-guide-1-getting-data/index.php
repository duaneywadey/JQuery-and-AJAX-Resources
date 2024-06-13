<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
	<h1>JSON test</h1>
	<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Suscipit accusamus doloremque nostrum voluptates odio minima dicta exercitationem dolorem assumenda. Suscipit consequuntur, nesciunt velit maiores reiciendis soluta magnam dolore. Commodi, dolore.</p>

	<button id="allProducts">View All Products</button>
	<button id="getProduct">Get Product 1</button>
	<button id="showImages">Show All Images</button>
	<button id="showPokemonInfo">Show Pokemon</button>
	<div class="product">
		<h3 id="productTitle"></h3>
		<h3 id="productPrice"></h3>
		<h3 id="productDescription"></h3>
		<h3 id="productCategory"></h3>
	</div>
	<ul id="itemsList">
	</ul>
	<ul id="imagesList">
	</ul>
	<script>

		$('#allProducts').on('click', function (e) {
			$.ajax({
				type: "GET",
				url: "https://fakestoreapi.com/products/",
				dataType: 'json',

				success: function (res) { 

					// How we access TWO OR MORE VALUES. For iterating through JSON object
					$.each(res, function (key, value) {
						$('#imagesList').append("<li>" + value.title +"</li>").hide().fadeIn(400);
					})
				}
			})
		})

		$('#showImages').on('click', function (e) {
			$.ajax({
				type: "GET",
				url: "https://fakestoreapiserver.reactbd.com/smart/",
				dataType: 'json',

				success: function (res) { 

					// How we access TWO OR MORE VALUES. For iterating through JSON object
					$.each(res, function (key, value) {
						$('#imagesList').append(
							"<h1>" + value.title + "</h1><img src='" + value.image + "'</i></li>"
							).hide().fadeIn(400);
					})
				}
			})
		})

		// $('#showPokemonInfo').on('click', function (e) {
		// 	$.ajax({
		// 		type: "GET",
		// 		url: 
		// 	})
		// })

		$('#getProduct').on('click', function (e) {
			$.ajax({
				type: "GET",
				url: "https://fakestoreapi.com/products/1",
				dataType: 'json',

				success: function (res) { 
					
					// How we get INDIVIDUAL VALUES
					$('.product').css({"border-style": "solid","border-color": "red"}).hide().fadeIn(400);
					$('#productTitle').text(res.title);
					$('#productPrice').text(res.price);
					$('#productDescription').text(res.description);
					$('#productCategory').text(res.category);

				}
			})
		})
	</script>
</body>
</html>