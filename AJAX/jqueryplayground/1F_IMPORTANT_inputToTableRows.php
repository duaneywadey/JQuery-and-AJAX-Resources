<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<style>
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>

	<div class="parent">
		<div class="children">
			<p>1 - Lorem, ipsum dolor sit, amet consectetur adipisicing elit. Labore aliquid aut veniam, fugiat minima dignissimos omnis sed quo ab officiis tempore quis sapiente, inventore eligendi atque accusamus ad culpa, nostrum.</p>
		</div>
		<div class="children">
			<p>2 - Lorem ipsum dolor sit amet consectetur adipisicing elit. Est atque adipisci mollitia praesentium, qui numquam aut voluptatum ipsum odit eum provident veniam, nihil fugiat aperiam, sequi repellendus animi ipsam nam.</p>
		</div>
		<div class="children">
			<p>3 - Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illo voluptatibus eaque, delectus enim, magni quos magnam officia non minus provident. Odit illo, velit, animi sequi doloribus quas recusandae aspernatur dolore?</p>
		</div>
		<div class="children">
			<p>4 - Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam itaque obcaecati reprehenderit perferendis fuga ipsam. Animi atque nisi reprehenderit ipsam voluptatum voluptatibus esse velit magni! Corrupti, nostrum eaque velit similique!</p>
		</div>
	</div>

	<table style="width:50%">
	  <tr>
	    <th>Company</th>
	    <th>Contact</th>
	    <th>Country</th>
	    <th>Grade</th>
	    <th>Final Grade</th>
	  </tr>
	  <tr>
	  	Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ratione inventore porro repudiandae explicabo, ullam autem sed laudantium, repellat qui modi ad enim illo, perferendis delectus neque aspernatur molestiae odit.
	    <td>Alfreds Futterkiste</td>
	    <td>Maria Anders</td>
	    <td>Germany</td>
	    <td class="gradeColumn">
	    	<input type="text" class="grade">
	    </td>
	    <td class="finalGradeColumn">
	    	<input type="text" class="finalGrade">
	    </td>
	  </tr>
	  <tr>
	  	Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ratione inventore porro repudiandae explicabo, ullam autem sed laudantium, repellat qui modi ad enim illo, perferendis delectus neque aspernatur molestiae odit.
	    <td>Alfreds Futterkiste</td>
	    <td>Maria Anders</td>
	    <td>Germany</td>
	    <td class="gradeColumn">
	    	<input type="text" class="grade">
	    </td>
	    <td class="finalGradeColumn">
	    	<input type="text" class="finalGrade">
	    </td>
	  </tr>
	</table>


	<script>

	$('.grade').on('input', function (e) {
		var finalGrade = $(this).val() * 500;
		$(this).closest('tr').find('.finalGradeColumn').find('.finalGrade').val(finalGrade);
	})


	</script>
</body>
</html>