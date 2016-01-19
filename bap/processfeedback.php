<?php

//create short variable names
$name=$_POST['name'];
$email=$_POST['email'];
$feedback=$_POST['feedback'];

//set up some static information
$toaddress = "walter.johnson.0301@mail.linnbenton.edu";

$subject = "Feedback from web site";

$mailcontent = "Customer name: ".$name."\n".
			   "Customer email: ".$email."\n".
               "Customer comments:\n".$feedback."\n";

$fromaddress = "From: webserver@example.com";

//invoke mail() function to send mail
mail($toaddress, $subject, $mailcontent, $fromaddress);

// printf(
//     "<html>
//     <head>
//     <title>Bob's Auto Parts - Feedback Submitted</title>
//     </head>
//     <body>
//     <h1>Feedback submitted</h1>
//     <p>Your feedback has been sent.</p>
//     </body>
//     </html>"
// )

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
        <p>Your feedback has been sent.</p>
    </body>
</html>
