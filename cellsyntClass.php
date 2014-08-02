<?php
/*
    Copyright (C) 2014 Jack-Benny Persson <jack-benny@cyberinfo.se>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/


/* 
    Version 0.1.1

    Usage example:
    $MySMS = new Cellsynt("myuser", "mYpaSS", "alpha", "Test");
    print $MySMS->sendSMS("0046701234567", "This is my SMS!");
*/

class Cellsynt
{
    public $username;
    public $password;
    public $origType;
    public $originator;
    public $phone;
    public $concat;
    public $charset;
    public $type;
    public $expiry;
    public $msg;

    public function __construct($username, $password, $origType = "alpha",
                                $originator = "Cellsynt", $concat = 6,
                                $charset = "UTF-8", $type = "text")
    {
        $this->username = $username;
        $this->password = $password;
        $this->origType = $origType;
        $this->originator = $originator;
        $this->concat = $concat;
        $this->charset = $charset;
        $this->type = $type;
    }

    public function sendSMS($phoneNr, $msg, $expiry = "")
    {
        $this->msg = $msg;
        $this->phoneNr = $phoneNr;
        $this->expiry = $expiry;
        
        $params = array ("username" => "$this->username",
                         "password" => "$this->password",
                         "destination" => "$this->phoneNr",
                         "originatortype" => "$this->origType",
                         "originator" => "$this->originator",
                         "allowconcat" => "$this->concat",
                         "charset" => "$this->charset",
                         "type" => "$this->type",
                         "expiry" => "$this->expiry",
                         "text" => "$this->msg");

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_URL, "https://se-1.cellsynt.net/sms.php");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, (http_build_query($params)));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $status = curl_exec($ch);
        curl_close($ch);
        return $status;
    }
}


?>
