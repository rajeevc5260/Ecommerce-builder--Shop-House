<?php

$con=new mysqli("localhost","root","","shop_house");


if($con->connect_error)
{
    echo $con->connect_error;
    die("Sorry Database Connection Failed");

}

?>