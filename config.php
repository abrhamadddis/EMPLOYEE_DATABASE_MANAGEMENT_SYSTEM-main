<?php

$link = mysqli_connect('localhost', 'root' , '',   'file-management');

if ($link === false) {
	die("ERROR: Could not connect." . mysqli_connect_error());
}

?>