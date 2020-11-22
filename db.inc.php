<?php
// database connnectivity is defined here
// start session for every page
session_start();
//  connecting to databese
//  parameers used : ip address, database username, database password, database name
$con=mysqli_connect('localhost','root','','ems');
?>