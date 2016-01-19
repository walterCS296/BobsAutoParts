<?php

//create short variable names
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$feedback = trim($_POST['feedback']);

//set up some static information
$toaddress = "feedback@example.com";

$subject = "Feedback from web site";

$mailcontent = "Customer name: ".$name."\n".
			   "Customer email: ".$email."\n".
               "Customer comments:\n".$feedback."\n";

$fromaddress = "From: webserver@example.com";

//invoke mail() function to send mail
mail($toaddress, $subject, $mailcontent, $fromaddress);

?>
<html>
    <head>
        <title>Bob's Auto Parts - Feedback Submitted</title>
        <link rel="stylesheet" href="styles/normalize.css">
        <link rel="stylesheet" href="styles/base.css">
    </head>
    <body>
        <div id="bapBox">
            <a href="bobs_front_page.php">
                <img id="bap" src="images/BobsLogo.png" height="88" width="238"/>
            </a>
        </div>
        <h1>Feedback submitted</h1>
        <p>Your feedback (shown below) has been sent.</p>
        <p><?php echo nl2br($mailcontent); ?> </p>
    </body>
</html>
