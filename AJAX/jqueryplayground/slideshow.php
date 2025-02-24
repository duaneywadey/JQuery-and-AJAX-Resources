<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<style>
		body {
			margin:0px;
			font-family:Arial, Helvetica, sans-serif;
			}
		.clearfix:before, .clearfix:after {
			content: "";
			display: table;
			}
		.clearfix:after {
			clear: both;
			}
		.container {
			width:1150px;
			margin:30px auto;
			}
		.container .box{
			width: 150px;
			}
		.slideshow {
			position:relative;
			height:160px;
			}
		.slideshow div {
			position:absolute;
			top:0;
			left:0;
			z-index:8;
			visibility:hidden;
			}
		.slideshow div.active{
			z-index:10;
			visibility:visible;
			}
		.slideshow div.last-active{
			z-index:9;
			visibility:hidden;
			}
		img {
			width: 250px;
			height: 250px;
		}
	</style>
</head>
<body>

	<div class="container clearfix">

		<div class="box clearfix">
			<h2>SlideShow</h2>

			<div class="slideshow">
			    <div class="items active">
				    <img src="https://images.unsplash.com/photo-1719937206498-b31844530a96?q=80&w=1974&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
			    </div>   
			    <div class="items">
				    <img src="https://images.unsplash.com/photo-1728327510584-49c84411d2e4?q=80&w=1908&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
			    </div>
			    <div class="items">
				    <img src="https://images.unsplash.com/photo-1728408828574-70a460530093?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" />
			    </div>
			</div>
		</div>

	</div> 

	<script>

	function slideSwitch() {
		var $next;
		var $active = $('.slideshow div.active');

		if ($active.length == 0) {
	        $active = $('.slideshow div:last');
	    }

	    if ($active.next().length) {
	    	$next = $active.next();
	    }

	    else {
	        $next = $('.slideshow div:first');
	    }

	    $active.addClass('last-active');
	    $next.css({opacity: 0.0}).addClass('active') .animate({opacity: 1.0}, 1000, function() {
	    		$active.removeClass('active last-active');
	    	});
	}

	$(function() {
	    setInterval(slideSwitch, 2000);
	});

	</script>
</body>
</html>