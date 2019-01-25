<?php
$NAME = filter_input(INPUT_POST, 'NAME');
$phonenumber = filter_input(INPUT_POST, 'phonenumber');
$IDNO = filter_input(INPUT_POST, 'IDNO');
$email = filter_input(INPUT_POST, 'email');
$house = filter_input(INPUT_POST, 'house');
$family = filter_input(INPUT_POST, 'family');
 $host= "localhost";
 $dbname="APPLYHOUSES";
 //CONNECTION
 if(mysqli_connect_error()){
	 
	 die('Connect Error('. mysqli_connect_errno().')'
	 .mysqli_connect_error());
 }
 else{
	 $sql="INSERT INTO applications (NAME, phonenumber,IDNO,email,house,family)
	values(&'NAME','phonenumber','IDNO', 'email', 'house', 'family')";
	echo "YOU HAVE SUCESSFULLY SUBMITED!!!!!!!!";
	echo "we will contact you shortly";
 } 
?>