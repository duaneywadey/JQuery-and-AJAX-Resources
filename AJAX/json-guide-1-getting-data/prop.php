<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>prop demo</title>
  <style>
  p {
    margin: 20px 0 0;
  }
  b {
    color: blue;
  }
  </style>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
 
<input id="check1" type="checkbox" checked="checked">
<label for="check1">Check me</label>
<p></p>
 
<script>
$( "input" ).on( "change", function() {
  var $input = $( this );
  $( "p" ).html(".attr( \"checked\" ): <b>" + $input.attr( "checked" ) + "</b><br>" +
    ".prop( \"checked\" ): <b>" + $input.prop( "checked" ) + "</b><br>" +
    ".is( \":checked\" ): <b>" + $input.is( ":checked" ) + "</b>" );
} ).trigger( "change" );
</script>
 
</body>
</html>