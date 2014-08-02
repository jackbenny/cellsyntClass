<?php
/* 
    A small example of what can be done with the cellcentClass.
    Here is a script that let's a user send SMS-messages from the command-line
    by giving two arguments to the script, the first one is the phone number,
    the second is the text message to be sent.
    Login information and originator text is set as static values here.
*/

// the class is required...
require ("../cellsyntClass.php");

// username and password information for the Cellsynt account and 
// the sender/originator
$username = "myuser";
$password = "sEcReT";
$sender = "From CLI";

// run a sanity check
sanitycheck();

// if we got past the sanity checks above, instantiate the class
$cliSMS = new Cellsynt($username, $password, "alpha", $sender);

// put the arguments into variables for readability
$phone = $argv[1];
$message = $argv[2];

// call the sendSMS function with the phone number and message
$status = $cliSMS->sendSMS($phone, $message);

// check the status of the message and print the result
checkstatus();

// if we got to down here, something was wrong, exit with status code 1
exit(1);


function checkstatus()
{
    global $status;
    // check for an OK message at the start of the line, in that case everything
    // was fine
    if (preg_match("/^OK/", $status))
    {
        print "Message was sent successfully. Status message reads:\n";
        print $status . "\n";
        exit(0);
    }
    // if there were no OK message, something didn't work
    else
    {
        print "Something didn't work out as expected. Status message reads:\n";
        print $status . "\n";
        exit(1);
    }

}

function sanitycheck()
{
    global $argv;
    // check if user entered two arguments
    if (!isset($argv[1]) || !isset($argv[2])) 
    {
        print "Usage: $argv[0] <phone nr> <'quoted text message'>\n";
        exit(1);
    }

    // check if the phone number looks valid
    if (!preg_match("/\d{7,16}/", $argv[1]))
    {
        print "That dosen't look like a valid phone number\n";
        exit(1);
    }
}

?>
