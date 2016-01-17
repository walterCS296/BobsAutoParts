<?php
  // create short variable names
  $tireqty = $_POST['tireqty'];
  $oilqty = $_POST['oilqty'];
  $sparkqty = $_POST['sparkqty'];
  $address = $_POST['address'];
  $find = $_POST['find'];
  $date = date('H:i, jS F Y');
  //$DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];
?>
<html>
    <head>
        <title>Bob's Auto Parts - Order Results</title>
    </head>
    <body>
        <h1>Bob's Auto Parts</h1>
        <h2>Order Results</h2>
        <?php
            echo "<p>Order processed at ";
            echo $date."<br />";
            // echo "<p>Your order is as follows: </p>";
            // echo "<p>$tireqty tires<br />";
            // echo "$oilqty bottles of oil<br />";
            // echo "$sparkqty spark plugs<br /></p>";
            
            $totalqty = 0;
	        $totalqty = $tireqty + $oilqty + $sparkqty;
	        echo "Items ordered: ".$totalqty."<br />";
	        
	        if ($totalqty == 0) {

        	  echo "You did not order anything on the previous page!<br />";
        
        	} else {
        
        	  if ($tireqty > 0) {
        		echo $tireqty." tires<br />";
        	  }
        
        	  if ($oilqty > 0) {
        		echo $oilqty." bottles of oil<br />";
        	  }
        
        	  if ($sparkqty > 0) {
        		echo $sparkqty." spark plugs<br />";
        	  }
        	}
	        
	        $totalamount = 0.00;

        	define('TIREPRICE', 100);
        	define('OILPRICE', 10);
        	define('SPARKPRICE', 4);
        
        	$totalamount = $tireqty * TIREPRICE
        				 + $oilqty * OILPRICE
        				 + $sparkqty * SPARKPRICE;
        
        	echo "Subtotal: $".number_format($totalamount,2)."<br />";
        	
        	$taxrate = 0.10;  // local sales tax is 10%
        	$totalamount = $totalamount * (1 + $taxrate);
        	echo "Total including tax: $".number_format($totalamount,2)."<br />";
        	
        	if ($address) {
        	    echo "<p>Address to ship to is: ".$address."</p>";
        	} elseif ($totalqty != 0) {
        	    echo "<p>Parts will not ship without an address.</p>";
        	}
        	
        	switch($find) {
        	   case "a" :
        	        $foundUs = "Regular Customer";
        	        break;
        	   case "b" :
        	        $foundUs = "Customer referred by TV advertising.";
        	        break;
        	   case "c" :
        	        $foundUs = "Customer referred by internet search";
        	        break;
        	   case "d" :
        	        $foundUs = "Customer referred by word of mouth";
        	        break;
        	   default :
        	        $foundUs = "We do not know how this customer found us.";
        	        break;
        	}
        	
        	echo "<p>$foundUs</p>";
        	
    //     	$outputstring = $date."\t".$tireqty." tires \t".$oilqty." oil\t"
				// 	.$sparkqty." spark plugs\t\$".$totalamount
				// 	."\t". $address. $foundUs."\n";
				
			$outputstring = "$date\t $tireqty tires\t $oilqty oil\t $sparkqty 
			                spark plugs\t $$totalamount\t $address\t $foundUs\n";
					
			echo "<p>$outputstring</p>";
			
			// open file for appending
	        @ $fp = fopen("../orders/orders.txt", 'ab');// "@" supresses PHP errors

        	if (!$fp) { //escapes all subsequent processing if orders.txt is not open
        	  echo "<p><strong> Your order could not be processed at this time.
        		    Please try again later.</strong></p>";
        	  exit;
        	}
        
        	flock($fp, LOCK_EX); // lock file for writing
        	fwrite($fp, $outputstring, strlen($outputstring));
        	flock($fp, LOCK_UN); // release write lock
        	fclose($fp);
        
        	echo "<p>Order written.</p>";
        ?>
    </body>
</html>