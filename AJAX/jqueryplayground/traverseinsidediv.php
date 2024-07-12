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
    <div class="squaresGroup">
      <h1>Group 1</h1>
      <div class="square">
        test1
        <button class="showInputField">Show Input Field</button>
        <input type="text" class="inputField" style="display: none;">
      </div>   
      <div class="square">
        test2
        <button class="showInputField">Show Input Field</button>
        <input type="text" class="inputField" style="display: none;">
      </div>   
      <div class="square">
        test3
        <button class="showInputField">Show Input Field</button>
        <input type="text" class="inputField" style="display: none;">
      </div>   
      <div class="square">
        test4
        <button class="showInputField">Show Input Field</button>
        <input type="text" class="inputField" style="display: none;">
      </div>   
    </div>
    <div class="squaresGroup">
      <h1>Group 2</h1> 
      <div class="square"></div>  
      <div class="square"></div>  
      <div class="square"></div>  
      <div class="square"></div>  
    </div>
    
    <script>

      $(document).ready(function () {

        var squaresGroup = $('.squaresGroup');

        squaresGroup.each(function () {

          var square = $(this).find('.square');
          var showInputField  = $(square).find('.showInputField');

          $(showInputField).on('click', function (e) {
            var inputField = $(this).siblings('.inputField');
            $(inputField).toggle('slow');
          })

        });

      })  
    </script>
</body>
</html>
