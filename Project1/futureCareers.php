<!DOCTYPE html>
<html>
  <head>
    <title>Future Employment</title>
    <!--Import Google Icon Font-->
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <!--Import materialize.css-->
    <link
      type="text/css"
      rel="stylesheet"
      href="css/materialize.min.css"
      media="screen,projection"
    />
  </head>
  <body>
    <h2>Career Possiblities</h2>
      <?php
          $xml = simplexml_load_file("information.xml") or die("Error: The xml object can't be loaded");
          echo "<ul>";
          foreach($xml->children() as $career) {
            echo "<li>" . $career->name . "</li>";
          }
          echo "</ul>";
      ?>
      <?php
          echo "<h2>Potential Technology Used</h2>";
          echo "<ul>";
          foreach($xml->children() as $technology) {
            echo "<li>" . $technology->techName . "</li>";
          }
          echo "</ul>";
      ?>
    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html>
