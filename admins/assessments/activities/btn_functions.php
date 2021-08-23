<?php 
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
	case 'remove':
		# code...
		doRemoveQuestion();
		break;
	
	case 'activity':
		# code...
		doAddTest();
		break;
	case 'update':
		# code...
		doUpdateTest();
		break;
	default:
		# code...
		break;
}


function doRemoveQuestion(){
include("../../../connections/db-connect.php");

	$id = $_GET['id']; 

	$sql = "DELETE FROM tblactivities WHERE ActivityID='$id'"; 
	if($conn->exec($sql)==true){
	  header("location: index.php");
	}

}

function doAddTest(){
include("../../../connections/db-connect.php"); 
 
	$Title = $_POST['Title']; 
	$Description = $_POST['Description']; 
	$Course = $_POST['Course']; 
	$Subject = $_POST['Subject'];  

	$filename = UploadImage("Image1");
	$Image1 = "files/". $filename ;


	$stmt = "INSERT INTO `tblactivities` (`Title`, `Description`, `Course`, `Subject`, `Image1`)  
	              VALUES ('$Title','$Description','$Course','$Subject','$Image1')";
	if($conn->exec($stmt)==true){ 
		header("location: index.php");
	}

}

function doUpdateTest(){
include("../../../connections/db-connect.php"); 
 
	$id =  $_POST['ActivityID'];

	$Title = $_POST['Title']; 
	$Description = $_POST['Description']; 
	$Course = $_POST['Course']; 
	$Subject = $_POST['Subject'];  

	$filename = UploadImage("Image1");
	$Image1 = "files/". $filename ;


if($Image1=="files/"){  
	$stmt = "UPDATE `tblactivities` SET `Title`='$Title', `Description`='$Description', `Course`='$Course', `Subject`='$Subject' 
				WHERE ActivityID='$id'";   
}else{ 
	$stmt = "UPDATE `tblactivities` SET `Title`='$Title', `Description`='$Description', `Course`='$Course', `Subject`='$Subject',Image1='$Image1' 
				WHERE ActivityID='$id'"; 
} 

	if($conn->exec($stmt)==true){ 
		header("location: index.php");
	}else{
		  header("location: index.php");
	}

}

  function UploadImage($imgname=""){
      $target_dir = "files/";
        $target_file = $target_dir  . basename($_FILES[$imgname]["name"]);
      $uploadOk = 1;
      $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
      
      
      if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"
        || $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
         if (move_uploaded_file($_FILES[$imgname]["tmp_name"], $target_file)) {
          return   basename($_FILES[$imgname]["name"]);
        }else{
        //   echo "Error Uploading File";
        //   exit;
        }
      }else{
        //   echo "File Not Supported";
        //   exit;
   }
}

?>