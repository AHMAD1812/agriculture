<?php 
$action = isset($_GET['action']) ? $_GET['action'] : "";

switch ($action) {
	case 'remove':
		# code...
		doRemoveQuestion();
		break;
	
	case 'course':
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

	$sql = "DELETE FROM tblsubject WHERE SubjectID='$id'"; 
	if($conn->exec($sql)==true){
	  header("location: index.php");
	}

}

function doAddTest(){
include("../../../connections/db-connect.php"); 
 
	$Subject = $_POST['Subject']; 


	$stmt = "INSERT INTO tblsubject ( Subject) 
	              VALUES ('$Subject')";
	if($conn->exec($stmt)==true){ 
		header("location: index.php");
	}

}

function doUpdateTest(){
include("../../../connections/db-connect.php"); 
 
	$id =  $_POST['SubjectID'];

	$Subject = $_POST['Subject'];  
	// $difficulty_id = $_REQUEST['difficulty_id'];
 

	$stmt = "UPDATE `tblsubject` SET	`Subject`='$Subject' 
								 WHERE `SubjectID`='$id'";
	if($conn->exec($stmt)==true){ 
		header("location: index.php");
	}

}

?>