<?php
  $pictures = array('images/tire.jpg', 'images/battery.jpg', 'images/brake.jpg', 'images/motor.jpg',
                    'images/door.jpg', 'images/steering_wheel.jpg', 'images/seat.jpg',
                    'images/exhaust.jpg', 'images/headlight.jpg', 'images/strut.jpg',
                    'images/mirror.jpg', 'images/radiator.jpg', 'images/transmission.jpg');

  shuffle($pictures);
?>
<html>
<head>
  <title>Bob's Auto Parts</title>
</head>
<body>

<h1>Bob's Auto Parts</h1>
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
