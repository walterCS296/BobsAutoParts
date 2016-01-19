<?php
  $pictures = array('images/tire.jpg', 'images/battery.jpg', 'images/brake.jpg', 'images/motor.jpg',
                    'images/door.jpg', 'images/steering_wheel.jpg', 'images/seat.jpg',
                    'images/exhaust.jpg', 'images/headlight.jpg', 'images/strut.jpg',
                    'images/mirror.jpg', 'images/radiator.jpg', 'images/transmission.jpg');

  shuffle($pictures);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Bob's Auto Parts</title>
    <link rel="stylesheet" href="styles/normalize.css">
    <link rel="stylesheet" href="styles/base.css">
  </head>
  <body>
  
    <!--<h1>Bob's Auto Parts</h1>-->
    <div id="bapBox">
      <img id="bap" src="images/BobsLogo.png" height="88" width="238"/>
    </div>
    <nav>
      <ul>
        <li><a href="orderform.html">Order Form</a></li><li>
        <a href="feedback.html">Customer Feedback</a></li><li>
        <a href="vieworders.php">Order List</a></li><li>
        <a href="vieworders2.php">Order Table</a></li>
        <!--<li><a href="orderform.html">Order Form</a></li>-->
      </ul>
    </nav>
    <div align="center">
      <table width = 100%>
        <tr>
          <?php
            for ($i = 0; $i < 3; $i++) {
              echo "<td align=\"center\"><img src=\"";
              echo $pictures[$i];
              echo "\"/></td>";
            }
          ?>
        </tr>
      </table>
    </div>
  </body>
</html>
