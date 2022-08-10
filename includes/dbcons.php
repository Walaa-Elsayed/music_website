<?php

// check the connection
$con = mysqli_connect('localhost','root','','music_website');

if(mysqli_connect_errno()){

    die('Failed to connect to mu sql'.mysqli_connect_errno());
}

?>