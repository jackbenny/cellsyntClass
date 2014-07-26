<?php
class Cellsynt
{
    public $username;
    public $password;
    public $origType;
    public $originator;
    public $msg;

    public function __construct($username, $password, $origType = "alpha",
                                $originator = "Cellsynt")
    {
        $this->username = $username;
        $this->password = $password;
        $this->origType = $origType;
        $this->originator = $originator;
    }

    public function sendMsg($msg)
    {
        $this->msg = $msg;
        return "User: $this->username, Password: $this->password" .
               ", OrigType: $this->origType, Originator: " .
               "$this->originator, MSG: $this->msg";
    }
}

$MySMS = new Cellsynt("jake", "testpw", "numeric", "123456666");
print $MySMS->sendMsg("Detta är mitt SMS!") . "\n"; 

?>
