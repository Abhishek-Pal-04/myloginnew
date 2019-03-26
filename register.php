<?php

 require_once 'dbconfig.php';

 if($_POST)
 {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $gender=$_POST['gender'];
  $college = $_POST['college'];
  $degree = $_POST['degree'];
  $rollno =$_POST['rollno'];
  
  
  try
  { 
  
   $stmt = $db_con->prepare("SELECT * FROM users WHERE email=:email");
   $stmt->execute(array(":email"=>$email));
   $count = $stmt->rowCount();

   $stmt = $db_con->prepare("SELECT * FROM users WHERE name=:name");
   $stmt->execute(array(":name"=>$name));
   $countu = $stmt->rowCount();
      

   if($count==0 &&$countu==0){
    
   $stmt = $db_con->prepare("INSERT INTO users(name,email,password,gender,college,degree,rollno) VALUES(:name, :email, :password, :gender, :college, :degree, :rollno )");
   $stmt->bindParam(":name",$name);
   $stmt->bindParam(":email",$email);
   $stmt->bindParam(":password",$password);
   $stmt->bindParam(":gender",$gender);
   $stmt->bindParam(":college",$college);
   $stmt->bindParam(":degree",$degree);
   $stmt->bindParam(":rollno",$rollno);
     
    if($stmt->execute())
    {
     echo "registered";
    }
    else
    {
     echo "Query could not execute !";
    }
   
   }
   else{
    
    echo "1"; 
   }
    
  }
  catch(PDOException $e){
       echo $e->getMessage();
  }
 }

?>
