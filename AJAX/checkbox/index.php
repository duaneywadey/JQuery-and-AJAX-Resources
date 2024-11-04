<!DOCTYPE html>
<html>
<head>
    <title>Radio Button Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="propTest">
            <h2>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloremque cum at consequuntur id odit harum blanditiis eos ratione officia excepturi, necessitatibus unde rem adipisci repellendus dolorem earum nisi quasi, praesentium!</h2>
        </div>
    <form>
     <div class="pricing-levels-3">
      <p><strong>Which level would you like? (Select 3 Levels)</strong></p>
      <input class="single-checkbox"type="checkbox" id="checkboxInput" name="vehicle" value="Bike1">Level 1<br>
      <input class="single-checkbox" type="checkbox" id="checkboxInput" name="vehicle" value="Bike2">Level 2<br>
      <input class="single-checkbox" type="checkbox" id="checkboxInput" name="vehicle" value="Bike3">Level 3<br>
      <input class="single-checkbox" type="checkbox" id="checkboxInput" name="vehicle" value="Bike4">Level 4<br>
      <input class="single-checkbox" type="checkbox" id="checkboxInput" name="vehicle" value="Bike5">Level 5<br>
      <input class="single-checkbox" type="checkbox" id="checkboxInput" name="vehicle" value="Bike6">Level 6<br>
      <input class="single-checkbox" type="checkbox" id="checkboxInput" name="vehicle" value="Bike7">Level 7<br>
      <input type="text" placeholder="type here" id="textInput">
  </div>
</form>

<script>
    const fruits = []
    $('.single-checkbox').change(function(e){
        fruits.push($(this).val());
        console.log(fruits);
        
        if ($('.single-checkbox:checked').length > 3) {
            $(this).prop('checked',false);
            $( "#textInput" ).prop( "disabled", true );
            alert("allowed only 3");
        }
    })

</script>
</body>
</html>
