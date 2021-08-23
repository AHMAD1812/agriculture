<?php 
include("../databank/header.php"); 
// include("modals.php"); 
// $user_id = $_SESSION['user_id'];
//$id =  $_SESSION['test_id'] = $_REQUEST['id'];




?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Subject
        <i><small></small></i>

      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Assessments</a></li>
        <li class="active">Subject</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
             <button type="button" class="btn btn-primary" id="add_pretest_modal" data-toggle="modal" data-target="#modal-addTest"> 
              Add Subject</button> 
            </div>
            <div class="box-body table-responsive no-padding">

              <table class="table table-hover">
              
                <thead>
                 
                  <th>SubjectID</th> 
                  <th>Subject</th>             
                  <th width="20%">Manage</th>
          
                </thead>

                    <?php
                      $stmt = $conn->prepare("SELECT * FROM  tblsubject");
                      $stmt->execute();  
                      while($row = $stmt->fetch()){
                      ?>
                          <tr>   
                          <td><?php echo $row['SubjectID']; ?></td>
                          <td><?php echo $row['Subject']; ?></td> 
                          <td>  <a href = "subject-update.php?id=<?php echo $row['SubjectID']; ?>" ><i class="fa fa-edit"> Edit</i></a> |
                          <a class="removeTest" href = "btn_functions.php?action=remove&id=<?php echo $row['SubjectID']; ?>" ><i class="fa fa-times"> Remove</i></a></td>
                          <!--<i class="fa fa-times"> Remove</i></a></td> -->
                          </tr>
                      <?php
                      }
                    ?>



              </table>
            </div>
            <!-- /.box-body -->
                  <div class="box-footer"> </div>
          </div> 

  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../../footer.php"); ?>

 

<form action="btn_functions.php?action=course" method="POST" > 
  <div class="modal modal-default fade" id="modal-addTest">
    <div class="modal-dialog"  >
      <div class="modal-content">
        <div class="modal-header">
           
          <div style="font-size: 20px">Add Subject</div>
        </div>
          <div class="modal-body" > 
               <div class="form-group">
                  <label>Subject</label>
                  <textarea name="Subject" row="10" class="form-control" style="width: 100%;" placeholder="Enter Subject" required></textarea>
              </div> 
            </div> 
            <div class="modal-footer">
            <div class="col-md-12">
                <a href="#" class="btn btn-default"  data-dismiss="modal" aria-hidden="true">Close</a>
                <input type="submit" name="btnAddTest" value="Save changes" class="btn btn-primary">
              </div>
            </div> 
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</form> 