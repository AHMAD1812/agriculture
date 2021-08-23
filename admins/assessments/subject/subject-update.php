<?php 
include("../../header.php");  

$id = $_GET['id'];

 $stmt = $conn->prepare("SELECT * FROM  tblsubject where SubjectID = '$id' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
    $Subject = $row['Subject'];  
  }
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Pre Test Update
        <i><small>Users</small></i>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> USERS</a></li>
        <li class="active">Update</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->
<form action="btn_functions.php?action=update" method="POST">

<div class="col-md-12">

    <div class="form-group">
      <label>Subject</label>
      <input type="hidden" name="SubjectID" value="<?php echo $id; ?>">
     <input type="text" name="Subject" class="form-control" style="width: 100%;" value="<?php echo $Subject; ?>" > 
    </div>

</div>
 


            <!-- /.box-body -->
             <div class="box-footer">
           <a href="index.php"><input type="button"  value="Back" class="btn btn-default"></a>
             <input type="submit" name="btnUpdateExam" value="Save changes" class="btn btn-info pull-right">
            </div>
          </div>
          <!-- /.box -->

   </div>   
</form>







  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->





<?php include("../../footer.php"); ?>


