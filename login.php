<?php 
include "connections/db-connect.php";
if(isset($_REQUEST['btn-login'])){
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    echo $username."<br>".$password;
    $stmt = $conn->prepare("select * from users where username='".$username."' and password='".$password."' ");
    
    $stmt->execute();
     if($stmt->rowCount() > 0){
      while($row = $stmt->fetch() ){

         $_SESSION['firstname']=$row['fname'];
         $_SESSION['lastname']=$row['lname'];
         $_SESSION['user_id']=$row['user_id'];
         $_SESSION['usertype_id']=$row['usertype_id'];
         echo 1;
         break;
      }
      if($_SESSION['usertype_id']==1){
        header("location: admins/home/index/index.php");
      }else if($_SESSION['usertype_id']==3){
        header("location: students/home/index/index.php");
      }
      
       
      }
    
    }
    
    
    
?>