<html>

<head>
 <link rel="stylesheet" type="text/css" href="main.css"/>
 <title>APPLY HOSTELS</title>
 </head>
 <body bgcolor="">
	 <div>
	      <div class="header">
                    
                           
                           <div class="logo">
        <span class="E">M</span><span class="r">a</span><span class="a">c</span><span class="s">H</span><span class="t">A</span><span class="u">k</span><span class="s">o</span>
                         </div>  
  &nbsp;&nbsp;</br>
					<div div="maacha">MACHAKOS VACANT HOUSES AND HOSTELS</div>

                               </div>			
			
   <nav id="navigation" valign="right">
      <ul">
	      
		       <li class="rounded_boki"> <a href="http://localhost/index.html"> HOME </a> </li>
	           <li class="rounded_boki"><a href="http://localhost/About%20us.html"> ABOUT </a></li>
	           <li class="rounded_boki"><a href="http://localhost/houses.html"> HOUSES </a></li>
	          
		      <li class="rounded_boka"><a href="http://localhost/apply%20now.html"><span style="color:red">REAPPLY</a></span> </li>
		       <li class="rounded_boki"><a href="http://localhost/contact.html">CONTACT US </a> </li>
		       <li class="rounded_boki"><a href="http://localhost/FAQS.html">FAQS </a></li>
		  
	  
	      </ul>




  </nav>






<?php

$name = $_POST['name'];
$phone = $_POST['phone'];
$reg = $_POST['reg'];
$email = $_POST['email'];
$house = $_POST['house'];
$family = $_POST['family'];
if(!empty($name)|| !empty($phone)||!empty($house) || !empty($reg)|| !empty($family)|| !empty($email))
    {
	$host="localhost";
    $dbusername="root";	
	$dbpassword="";
	$dbname="apply";
	
	//connection
	$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
	if(mysqli_connect_error())
	     {die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error()); }
	 else{  
	         $SELECT = "SELECT email From apply Where email = ? LIMIT 1";
	         $INSERT = "INSERT Into apply (name,phone,reg,email,house,family) values(?,?,?,?,?,?)"; 
             //PREPARE
			 $stmt=$conn->prepare($SELECT);
			 $stmt->bind_param("s",$email);
              $stmt->execute();
              $stmt->store_result();
              $rnum = $stmt->num_rows;
                 if($rnum==0){
					 $stmt->close();
                        $stmt=$conn->prepare($INSERT);
                      $stmt->bind_param("ssssii", $name,$phone, $reg, $email,$house,$family);
                       $stmt->execute();
              echo"APPLICATION SUCCESSFULL!!!";
              echo"We will contact you soon.Thank you.";			  
					   }		
					   
					   else{echo"SOMEONE ELSE HAS SIMILAR EMAIL ACCOUNT. PLEASE REAPPLY";}
                        $stmt->close();
						$conn->close();
						}
	
    }
else
   {
	echo"ALL HIGHLIGHTED FIELS ARE REQUIRED";
	
	die();
	
   }
?>
</html>