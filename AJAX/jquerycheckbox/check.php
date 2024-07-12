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
          <div class="checkboxes">
            <input class="single-checkbox"type="checkbox" name="vehicle" value="Bike1">Level 1<br>
            <input class="single-checkbox" type="checkbox" name="vehicle" value="Bike2">Level 2<br>
            <input class="single-checkbox" type="checkbox" name="vehicle" value="Bike3">Level 3<br> 
            <input class="single-checkbox" type="checkbox" name="vehicle" value="Bike3">Level 3<br> 
            <input class="single-checkbox" type="checkbox" name="vehicle" value="Bike3">Level 3<br> 
        </div>

    </div>
</form>

<script>

    var choices = []
    $('.single-checkbox').on('click', function (e) {
        choices.push($(this).val());
        console.log(choices)
        if ($('.single-checkbox').filter(':checked').length >= 2) {
            $('.single-checkbox').not($('.single-checkbox').filter(':checked')).prop('disabled', true);
        } 
        else {
            $('.single-checkbox').prop('disabled', false);
        }
    })
    
</script>
</body>
</html>
