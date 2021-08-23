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

	$id = $_GET['courseID']; 

	$sql = "DELETE FROM tblcourse WHERE CourseID='$id'"; 
	if($conn->exec($sql)==true){
	  header("location: index.php");
	}

}

function doAddTest(){
include("../../../connections/db-connect.php"); 
 
	$course = $_POST['Course']; 


	$stmt = "INSERT INTO tblcourse ( Course) 
	              VALUES ('$course')";
	if($conn->exec($stmt)==true){ 
		header("location: index.php");
	}

}

function doUpdateTest(){
include("../../../connections/db-connect.php"); 
 
	$id =  $_POST['CourseID'];

	$Course = $_POST['Course'];  
	// $difficulty_id = $_REQUEST['difficulty_id'];
 

	$stmt = "UPDATE `tblcourse` SET	`Course`='$Course' 
								 WHERE `CourseID`='$id'";
	if($conn->exec($stmt)==true){ 
		header("location: index.php");
	}

}

?>