<?php 

include("../databank/header.php"); 


// $user_id = $_SESSION['user_id'];
//$test_desc = $_SESSION['test_desc'];
 

?>

<style type="text/css">
  .row {
    margin-bottom: 5px;
  }
</style>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         RESULTS
        <i><small>This is where the results of examination</small></i></h1>
        <form action="" method="POST">
        <div class="container content">
          <div class="col-sm-2"></div>
          <div class="col-sm-8">
                <div class="panel">
                  <div class="panel-header"></div>
                  <div class="panel-body"> 

                     <div class="row">
                      <div class="col-sm-12 search1">
                        <label class="col-sm-3">Date Taken:</label>
                        <div class="col-sm-9">
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                            <input required autocomplete="off" type="text" value="<?php echo isset($_POST['date_taken']) ? $_POST['date_taken'] : DATE('m/d/Y'); ?>" name="date_taken" class="form-control pull-right datepicker" id="datemask2" placeholder="mm/dd/yyyy">
                          </div>
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-sm-12 search1">
                        <label class="col-sm-3">Course:</label>
                        <div class="col-sm-9"> 
                            <select id="Course" name="Course" style="width: 100%;" class="form-control select2"  tabindex="1" >
                          <?php 
                              $stmt = $conn->prepare("SELECT * FROM  tblcourse");
                              $stmt->execute();  
                              while($row = $stmt->fetch()){
                                echo '<option>'.$row['Course'].'</option>';
                              } 
                            ?> 
                            </select>
                        </div>
                      </div>
                    </div>    
                     <div class="row">
                      <div class="col-sm-12 search1">
                        <label class="col-sm-3">Semester:</label>
                        <div class="col-sm-9">
                           <select name="Semester" style="width: 100%;" class="form-control select2"  tabindex="1" >
                            <option <?php echo isset($_POST['Semester']) ? ($_POST['Semester']=="1ST SEMESTER") ?  "SELECTED"  : "" : ""; ?> >1ST SEMESTER</option>
                            <option <?php echo isset($_POST['Semester']) ? ($_POST['Semester']=="2ND SEMESTER") ?  "SELECTED"  : "" : ""; ?> >2ND SEMESTER</option> 
                            </select>  
                        </div>
                      </div>
                    </div>    
                      <div class="row">
                      <div class="col-sm-12 search1">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-9">
                           <input type="submit" name="submit" class="btn btn-success">
                        </div>
                      </div>
                    </div>  
                  </div>
                </div> 
          </div>
          <div class="col-sm-2"></div> 
  </div>
 </form>
    </section>

  <section class="content">
    <!-- Main content -->




          <div class="box">
            <div class="box-header">
            </div>

            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">

<center>BSA PILAR <br>
College of Agriculture<br>
 OVERALL RESULT
 <?php
     $date_taken = isset($_POST['date_taken']) ? date_format(date_create($_POST['date_taken']),"Y-m-d") : "";
      $course  = isset($_POST['Course']) ? $_POST['Course'] : "";
      $semester = isset($_POST['Semester']) ? $_POST['Semester'] : ""; 
 ?>
  </center>

 Teacher: 
             <i>   <?php // echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h4>


                <tr>

                   <?php 
$c = 0;
$numbering = 1;

?>
                  <th> Rank No.</th>

                  <th>Name</th>
                  <th>Program/Course</th>
                  <th>Score</th>

                  <th>Percentage</th>
                  <th>Total Questions</th>

                  <th>Required Perecentage</th>

                  <th>Remarks</th>
                  <th>Date Taken</th>
                  <!--  <th>Manage</th> -->
                  </tr>
    <?php
    // $stmt2 = $conn->prepare("SELECT * FROM  examproper WHERE test_desc = 'ECE' ");
    // $stmt2->execute(); 

     // $date_taken = isset($_POST['date_taken']) ? date_format(date_create($_POST['date_taken']),"Y-m-d") : "";
     $course  = isset($_POST['Course']) ? $_POST['Course'] : "";
     $semester = isset($_POST['Semester']) ? $_POST['Semester'] : ""; 

$sql = "SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U 
        WHERE SRE.access_code = E.access_code  and test_desc = course AND SRE.student_id=U.user_id
        AND course = '$course' AND  year = '$semester' AND DATE(date_taken)='$date_taken' ORDER BY percentage DESC";


      $stmt = $conn->prepare($sql);


    // $stmt = $conn->prepare("SELECT * FROM  studentresult_exams as SRE, examproper as E, users as U WHERE SRE.test_id = E.test_id and E.user_id = '$user_id' and U.user_id = SRE.student_id AND test_desc LIKE '%$course%' AND category_exam LIKE '%$subject%' AND year LIKE '%$semester%' ORDER BY percentage DESC");

    $stmt->execute(); 

    while($row = $stmt->fetch()){
    ?>
                <tr>

                    <td><?php echo $numbering;?>   </td>
                 
                  <td><?php echo $row['fname']; ?> &nbsp;
                  <?php echo $row['mname']; ?>  &nbsp;
                  <?php echo $row['lname']; ?> </td>
                  <td><?php echo $row['test_desc']; ?></td>
                  
                  <td><?php echo $row['score']; ?></td>
                    
                  <td><?php echo $row['percentage']."%"; ?> </td>
                     <td><?php echo $row['total_questions'] ; ?></td>
                       <td><?php echo $row['passing_rate'] ."%"; ?></td>
                  <td><?php echo $row['remarks']; ?> </td>
                  <td><?php echo $row['date_taken']; ?> </td>
                <!--  <td><a href="studentresult-view.php?student_id=<?php echo $row['student_id'];?>&test_id=<?php echo $row['test_id'];?>">View</a></td> -->
                

</tr>

<?php 
$numbering++;?>
 
    <?php
    }
    ?>

              </table>
            </div>
            <!-- /.box-body -->
             <div class="box-footer">
           
            </div>
          </div>
          <!-- /.box -->




    <div class="row no-print">
  <center><button type="button" class="btn btn-info pull-center" button onclick="myFunction()">Print Result</button>
  <script>
  function myFunction(){


    window.print();
    
  }

  </script>

<br>
<br>  <div class="row no-print">
 <a href="export.php?Course=<?php echo $course; ?>&Semester=<?php echo $semester;?>&date_taken=<?php echo $date_taken ?>"> <button type="button" class="btn btn-info pull-center">EXPORT TO EXCEL</button></a> 
  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->




Prepared by:

 <i>   <?php// echo $_SESSION['firstname']." ". $_SESSION['lastname'] ?> </h4>

 <div class="row no-print">      
 <?php include("../../footer.php"); ?>


