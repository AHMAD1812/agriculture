<?php 
include("../databank/header.php"); 
// include("modals.php"); 
// $user_id = $_SESSION['user_id'];
//$id =  $_SESSION['test_id'] = $_REQUEST['id'];




?>
<style type="text/css">
  .stretch img {
    width: 100%;
    height: 20px;
  }
</style>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Activities
        <i><small></small></i>

      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Assessments</a></li>
        <li class="active">Activities</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->



          <div class="box">
            <div class="box-header">
             <button type="button" class="btn btn-primary" id="add_pretest_modal" data-toggle="modal" data-target="#modal-addTest"> 
              Add Activity</button> 
            </div>
            <div class="box-body table-responsive no-padding">

              <table id="example1" class="table table-hover">
              
                <thead>
                 
                  <th>Title</th> 
                  <th>Description</th>    
                  <th>Course</th>
                  <th>Subject</th>   
                  <th width="10%">Attachment</th>                
                  <th width="20%">Manage</th>
          
                </thead>

                    <?php
                      $stmt = $conn->prepare("SELECT * FROM  tblactivities");
                      $stmt->execute();  
                      while($row = $stmt->fetch()){
                      ?>
                          <tr>   
                          <td><?php echo $row['Title']; ?></td>
                          <td><?php echo $row['Description']; ?></td> 
                          <td><?php echo $row['Course']; ?></td> 
                          <td><?php echo $row['Subject']; ?></td> 
                          <td class="stretch"><img src="<?php echo $row['Image1']; ?>" /></td> 
                          <td>  <a href = "activity-update.php?id=<?php echo $row['ActivityID']; ?>" ><i class="fa fa-edit"> Edit</i></a> |
                          <a class="removeTest" href = "btn_functions.php?action=remove&id=<?php echo $row['ActivityID']; ?>" ><i class="fa fa-times"> Remove</i></a></td>
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

 

<form action="btn_functions.php?action=activity" method="POST" enctype="multipart/form-data" > 
  <div class="modal modal-default fade" id="modal-addTest">
    <div class="modal-dialog"  >
      <div class="modal-content">
        <div class="modal-header">
           
          <div style="font-size: 20px">Add Activity</div>
        </div>
          <div class="modal-body" > 
               <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="Title"  class="form-control" style="width: 100%;" placeholder="Enter Title" required> 
              </div> 
               <div class="form-group">
                  <label>Description</label>
                  <textarea name="Description" row="10" class="form-control" style="width: 100%;" placeholder="Enter Description" required></textarea>
              </div> 
               <div class="form-group">
                  <label>PROGRAM/COURSE</label> 
                  <select name="Course" style="width: 100%;" class="form-control select2"  tabindex="1" >
                    <?php 
                      $stmt = $conn->prepare("SELECT * FROM  tblcourse");
                      $stmt->execute();  
                      while($row = $stmt->fetch()){
                        echo '<option>'.$row['Course'].'</option>';
                      } 
                    ?> 
                  </select>  
              </div>
              <div class="form-group">
                <label>SUBJECT</label>

                <select name="Subject" style="width: 100%;" class="form-control select2"  tabindex="1" >
                   <?php 
                      $stmt = $conn->prepare("SELECT * FROM  tblsubject");
                      $stmt->execute();  
                      while($row = $stmt->fetch()){
                        echo '<option>'.$row['Subject'].'</option>';
                      }                     ?> 
                </select>  
                </div> 
              <div class="form-group"> 
                  <label>Attachment Image:</label> 
                  <input type="file" name="Image1" value="" id="Image1"/> 
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