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

	<div class="classTest">
		<p>Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Molestias dolores nihil debitis? Harum beatae deserunt quod adipisci. Repudiandae nostrum tenetur nesciunt quia eligendi! Repellat, perspiciatis? Facilis accusamus aliquam ea recusandae!</p>
		<p>Lorem ipsum dolor sit, amet consectetur adipisicing, elit. Molestias dolores nihil debitis? Harum beatae deserunt quod adipisci. Repudiandae nostrum tenetur nesciunt quia eligendi! Repellat, perspiciatis? Facilis accusamus aliquam ea recusandae!</p>	

	</div>

	<button id="allProducts">View All Products</button>
	<input type="text" id="productID">
	<button id="getProduct">Get Product</button>
	<button id="showImages">Show All Images</button>
	<button id="showPokemonInfo">Show Pokemon</button>
	<button id="hideImages">Hide Images</button>
	<div class="product">
		<h3 id="productTitle"></h3>
		<h3 id="productPrice"></h3>
		<h3 id="productDescription"></h3>
		<h3 id="productCategory"></h3>
	</div>
	<ul id="pokemonsList">
	</ul>
	<ul id="productsList">	
	</ul>
	<ul id="imagesList">
	</ul>
	<div class="response error"></div>
	<form id="myForm"> 
		<input type="radio"name="option" value="HTML">
		<label for="html">HTML</label><br>
		<input type="radio" name="option" value="CSS">
		<label for="html">CSS</label><br>
		<input type="radio" name="option" value="JavaScript">
		<label for="html">JavaScript</label><br>
		<input type="radio" name="option" value="JQuery">
		<label for="html">JQuery</label><br>
	</form> 
	<p> 
		The value of the option selected is:  
		<span class="output"></span> 
	</p> 






	<script>

		// ON SELECT
		 $("input[type='radio']").on('click', function() { 
		 	$('.output').text($(this).val())
        }); 

		$('#allProducts').on('click', function (e) {
			$('#imagesList').hide();
			$.ajax({
				type: "GET",
				url: "https://fakestoreapi.com/products/",
				dataType: 'json',

				success: function (res) { 
					
					// How we access TWO OR MORE VALUES. For iterating through JSON object
					$.each(res, function (key, value) {
						$('#productsList').append("<li>" + value.title +"</li>").hide().fadeIn(400);
					})
				}
			})
		})

		$('#showImages').on('click', function (e) {
			$('#productsList').hide();
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

		$('#showPokemonInfo').on('click', function (e) {
			$.ajax({
				type: "GET",
				url: "https://calmcode.io/static/data/pokemon.json",
				dataType: 'json',

				success: function (res) {
					$.each(res, function (key, value) {
						$('#pokemonsList').append(
							"<li>" + value.type + "</li>"
							).hide().fadeIn();
					})
				}
			})
		})

		$('#getProduct').on('click', function (e) {

			var productID = $('#productID').val();

			$.ajax({
				type: "GET",
				url: "https://fakestoreapi.com/products/" + productID,
				dataType: 'json',

				success: function (res) { 
					$('.response').hide();
					// How we get INDIVIDUAL VALUES
					$('.product').css({"border-style": "solid","border-color": "red"}).hide().fadeIn(400);
					$('#productTitle').text(res.title);
					$('#productPrice').text(res.price);
					$('#productDescription').text(res.description);
					$('#productCategory').text(res.category);

				},

				// Show error msg
				error: function(res) {	
				  $('.response').show();
				  $('.product').hide();
				  $('.response').addClass('error');
			      $('.error').html('<h1 style="color: red;">Product ' + productID + 
			      	' NotAvailable</h1>');
			    }

			})
		})
	</script>
</body>
</html>