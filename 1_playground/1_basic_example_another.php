<!DOCTYPE html>
<html>
  <head>
    <title>JavaScript &amp; jQuery - Chapter 7: Introducing jQuery - Basic Example</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div id="page">
      <h1 id="header">List</h1>
      <h2>Buy groceries</h2>
      <ul>
        <li id="one" class="hot"><em>fresh</em> figs</li>
        <li id="two" class="hot">pine nuts</li>
        <li id="three" class="hot">honey</li>
        <li id="four">balsamic vinegar</li>
      </ul>

      <h1>New Phones</h1>
      <ul>
        <li>iphone</li>
        <li>samsung</li>
        <li>LG</li>
        <li>Oppo</li>
      </ul>
    </div>
    <script src="jquery-1.11.0.js"></script>
    <script>
        $('li').hide().fadeIn(1000);
        $('li').on('click', function() {
          $(this).fadeOut("normal", function () {
            $(this).remove();
          })
      });
    </script>
  </body>
</html>