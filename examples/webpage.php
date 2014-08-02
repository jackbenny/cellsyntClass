<?php
/* 
    An example of what the cellsyntClass can be used for.
    Here is a simple webpage from which one can send SMS-message by specifing
    phone number, text message and sender information.
*/

// the class is required for this to work
require ("../cellsyntClass.php");

// start the HTML
print <<<_START_HTML_
<!DOCTYPE html>
<head>
<title>Example SMS webpage</title>
<meta charset="UTF-8" />
</head>

<body>
<h1>Send SMS-message</h1>

<form action="$_SERVER[PHP_SELF]" method="post">
Phone number:<input type="text" name="phone" size="18" maxlength="18"><br/>
Message:<br/>
<textarea name="message" cols="70" rows="15"></textarea><br/>
Sender:<input type="text" name="sender" size="11" maxlength="11"><br/>
<input type="submit" value="Send SMS"><br/>
</form>
_START_HTML_;

// check if the form has been submitted in which case we send the SMS
if((isset($_POST['phone'])) || (isset($_POST['message'])) ||
    (isset($_POST['sender'])))
{
    // make variables of the _POST array
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    $sender = $_POST['sender'];

    // instantiate class with $sender and hardcoded user and password
    $MySMS = new Cellsynt("myuser", "sEcReT", "alpha", "$sender");
    // call the sendSMS function and print the status-message on the webpage
    print "<p>" . $MySMS->sendSMS($phone, $message) . "</p>\n";
}

?>

</body>
</html>
