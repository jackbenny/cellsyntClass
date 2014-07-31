<?php

$ch = curl_init("http://belanna.nixnet.jke/loggedin.txt");
$data;
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
curl_close($ch);
//print "$data\n";
?>
