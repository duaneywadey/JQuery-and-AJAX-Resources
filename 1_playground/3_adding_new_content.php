<!DOCTYPE html>
<html>
  <head>
    <title>JavaScript &amp; jQuery - Chapter 7: Introducing jQuery - Adding New Content</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div id="page">
      <h1 id="header">List</h1>
      <h2>Buy groceries</h2>
      <ul>
        <li id="one" class="hot"><em>fresh</em> figs</li>
        <li id="two" class="hot">nawp nuts</li>
        <li id="three" class="hot">honey</li>
        <li id="four">balsamic vinegar</li>
        <li class="superHot">hottt</li>
      </ul>
    </div>
    <script src="jquery-1.11.0.js"></script>
    <script>
      $(function() {
        $('li:contains("nawp")').text('HEHEH');
        $('li.hot').html(function() {
          return '<em>' + $(this).text() + '</em>';
        });

        $('.superHot').on('click', function (e) {
          $(this).html("<p style='color:red;'><i>HOOOOOOOOOT</i></p>")
        })
        $('li#one').remove();
      });
    </script>
  </body>
</html>