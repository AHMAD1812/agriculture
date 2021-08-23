<?php
include("../../../../connections/db-connect.php");
include("function.php");

$lettersArr = array("A", "B", "C", "D", "E","F", "G", "H", "I", "J","K", "L", "M", "N", "O","P", "Q", "R", "S", "T","U", "V", "W", "X", "Y","Z", "1", "2", "3", "4","5", "6", "7", "8", "9");
$tempArr = array();
$accesscode = "";
for($i = 0; $i < 6; $i++){
  $randNum = (rand(0,33));
  $tempArr[$i]=$lettersArr[$randNum];
  $accesscode = $accesscode.$tempArr[$i];
}

 if (!empty($_SESSION['gcCart'])){   
 	$test_id =$_SESSION['test_id'];
 	$user_id = $_SESSION['user_id'];

	  $count_cart = count($_SESSION['gcCart']); 
	for ($i=0; $i < $count_cart  ; $i++) { 
		 $q_id = $_SESSION['gcCart'][$i]['q_id'];
		$student_answer= $_SESSION['gcCart'][$i]['answer'];
		 

		$question_retrieve = $conn->prepare("SELECT * FROM questions 
		WHERE q_id = '$q_id' and correct_answer = '$student_answer' ");
		$question_retrieve->execute();

		$score = 0;
		if($question_retrieve->rowCount() > 0){
			 $score = 1;
		}else{
			$score = 0;
		}

	  // echo $score.'<br/>';

		$sql = "INSERT INTO `studentdata_tests` (`test_id`, `q_id`, `answer`, `status`, `student_id`,`ID_PERTAKE`) VALUES ('$test_id', '$q_id', '$student_answer','{$score}','{$user_id}','{$accesscode}')"; 
		$result = $conn->prepare($sql);
		$result->execute();

	}
}


	
?>
<script type="text/javascript">
window.location="testpaper-result.php?id=<?php echo $accesscode; ?>";
</script>