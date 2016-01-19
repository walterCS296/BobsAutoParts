<?php
  //create short variable name
  //$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
    <head>
      <title>Bob's Auto Parts - Customer Orders</title>
      <link rel="stylesheet" href="styles/normalize.css">
      <link rel="stylesheet" href="styles/base.css">
    </head>
    <body>
        <!--<h1>Bob's Auto Parts</h1>-->
        <div id="bapBox">
            <a href="bobs_front_page.php">
                <img id="bap" src="images/BobsLogo.png" height="88" width="238"/>
            </a>
        </div>
        <h2>Customer Orders</h2>
        <?php
        
           @$fp = fopen("../orders/orders.txt", 'rb');
        
           if (!$fp) {
             echo "<p><strong>No orders pending.
                   Please try again later.</strong></p>";
             exit;
           }
           
           flock($fp, LOCK_SH); // lock file for reading
        
           while (!feof($fp)) {
              $order= fgets($fp, 999);
              echo $order."<br />";
           }
           
           flock($fp, LOCK_UN); //release read lock
        
           echo "Final position of the file pointer is ".(ftell($fp));
           echo "<br />";
           rewind($fp);
           echo "After rewind, the position is ".(ftell($fp));
           echo "<br />";
        
           fclose($fp);
        
        ?>
    </body>
</html>
