<?php

$db = mysqli_connect("localhost", "novasg1", "Montclair123", "novasg1_rotispot");

if(!$db) 
{
    die("Connection failed: ".mysqli_connect_error());
}
?>
