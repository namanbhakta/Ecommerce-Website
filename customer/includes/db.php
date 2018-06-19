<?php
$con =mysqli_connect("localhost","root","","ecommerce");

if(mysqli_connect_errno()){
    echo "Falied to connect to MySQL : ". mysqli_connect_error();
}

?>