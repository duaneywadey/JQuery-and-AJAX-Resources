<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>data demo</title>
  <style>
  div {
    color: blue;
  }
  span {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
 
<div>
  The values stored were
  <span data-postid = "dataIDtestYes" id="getThis"></span>
  and
  <span></span>

</div>
 
<script>
var dataTest = $("#getThis").data("postid");
console.log(dataTest);
</script>
 
</body>
</html>