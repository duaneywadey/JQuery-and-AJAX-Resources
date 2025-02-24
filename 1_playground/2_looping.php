<!DOCTYPE html>
<html>
  <head>
    <title>JavaScript &amp; jQuery - Chapter 7: Introducing jQuery - Basic Example</title>
    <link rel="stylesheet" href="styles.css" />
    <style>
      .nope {
        color: red;
      }
    </style>
  </head>
  <body>
    <div id="page">
      <h1 id="header">List</h1>
      <h2>Buy groceries</h2>
      <ul>
        <li id="one" class="hot"><em>fresh</em> figs</li>
        <li id="two" class="hot">pine nuts</li>
        <li id="three" class="hot">honey</li>
        <li class="nope">COOL</li>
        <li id="four">balsamic vinegar</li>
      </ul>
    </div>
    <script src="jquery-1.11.0.js"></script>
    <script>
      $('li em').addClass('seasonal');
      $('li.hot').addClass('favorite');
    </script>
  </body>
</html>