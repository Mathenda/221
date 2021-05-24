<?php
session_start();
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

$con= mysqli_connect("localhost","root","","Voter");

if(!$con) die("Connection Failed".mysqli_connect_error());
?> 
