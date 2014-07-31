# cellsyntClass #
This is a PHP class for sending SMS messages through Cellsynt's
(http://www.cellsynt.se) API. It's made to be as easy and straight forward as
possible, so anyone can implement it in their own applications.

## Usage ##
Start with including the file cellsyntClass.php in your application. Next off
create a new object of the class 'Cellsynt' with appropriate parameters,
username, password etc. Then, to actually send an SMS call the objects function
call 'sendSMS' with the parameters phone number, message and optionally expiry
date. See the quick example below.

    <?php
    require ("cellsyntClass/cellsyntClass.php");

    $myCellsynt = new Cellsynt("myuser", "sEcReT", "alpha", "Test");
    print $myCellsynt->sendSMS("0046701234567", "This is just a test SMS!");
    ?>
    
### List of avaliable parameters ###
Parameters for the class in order:

 * username (required)
 * password (required)
 * originator type (optional, default is 'alpha')
 * originator (optional, default is 'Cellsynt')
 * concatenated (optional, default is maximum, 6)
 * charset (optional, default is UTF-8)
 * type (optional, default is text (only text and flash works with this class))

Parameters for the sendSMS function in order:

 * phone number (required)
 * message (required)
 * expiry date (optional, Unix Timestamp when message should expire)

## Requirements ##
The class requires PHP5 and the PHP5 cURL module (php5-curl on Debian systems).

## Copyright ##
This class is written by Jack-Benny Persson and released under GNU GPL
version 2. 

Note that I am not in any way affiliated with Cellsynt. 
