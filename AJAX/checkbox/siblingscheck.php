<!DOCTYPE html>
<html>
<head>
    <title>Radio Button Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .square {
            background-color: aliceblue;
            border-style: solid;
            width: 200px;
            height: 100px;
            margin-top: 10px;
            font-family: 'Papyrus';
            font-size: 2em;
        }
    </style>
</head>
<body>
    <div></div>
    <div class="checkboxGroup">
        <h1>Checkbox Group</h1>
        <form>
          <p>
            <input type="checkbox" name="newsletter" class="checkboxInput" value="Hourly">

            <input type="checkbox" name="newsletter" class="checkboxInput" value="Daily">
            <input type="checkbox" name="newsletter" class="checkboxInput" value="Weekly">

            <input type="checkbox" name="newsletter" class="checkboxInput" value="Monthly">
            <input type="checkbox" name="newsletter" class="checkboxInput" value="Yearly">
          </p>
        </form>    
    </div>

    <div class="checkboxGroup">
        <h1>Checkbox Group 2</h1>
        <form>
          <p>
            <input type="checkbox" name="newsletter" class="checkboxInput" value="Hourly">

            <input type="checkbox" name="newsletter" class="checkboxInput" value="Daily">
            <input type="checkbox" name="newsletter" class="checkboxInput" value="Weekly">

            <input type="checkbox" name="newsletter" class="checkboxInput" value="Monthly">
            <input type="checkbox" name="newsletter" class="checkboxInput" value="Yearly">
          </p>
        </form>    
    </div>

    

    <script>
        
        $(document).ready(function() {
          // Select all checkbox groups
          var checkboxGroups = $('.checkboxGroup');

          // Attach event listener to each checkbox group
          checkboxGroups.each(function() {

            var checkboxes = $(this).find('.checkboxInput');

            checkboxes.on('change', function() {
              // Count the number of selected checkboxes within the current checkbox group
              var selectedCount = checkboxes.filter(':checked').length;

              // If the selected count is equal to or greater than 3
              if (selectedCount >= 3) {

                // Disable the unchecked checkboxes within the current checkbox group
                checkboxes.not(':checked').prop('disabled', true);

              } 
              else {
                // Enable all checkboxes within the current checkbox group
                checkboxes.prop('disabled', false);
              }
              
            });
          });
        });

    </script>
</body>
</html>
