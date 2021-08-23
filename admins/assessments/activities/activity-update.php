<?php 
include("../../header.php");  

$id = $_GET['id'];

 $stmt = $conn->prepare("SELECT * FROM  tblactivities where ActivityID = '$id' ");
 $stmt->execute(); 
 while($row = $stmt->fetch()){
    $ActivityID = $row['ActivityID'];  
    $Title = $row['Title'];  
    $Description = $row['Description'];  
    $Course = $row['Course'];  
    $Subject = $row['Subject'];    
  }
?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Activity Update
        <i><small>Users</small></i>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Activity</a></li>
        <li class="active">Update</a></li>
      </ol>
    </section>

  <section class="content">
    <!-- Main content -->
<form action="btn_functions.php?action=update" method="POST" enctype="multipart/form-data">

<div class="col-md-12">

<div class="form-group">
    <label>Title</label>
    <input type="hidden" name="ActivityID" value="<?php echo $ActivityID;?>">
    <input type="text" name="Title"  class="form-control" style="width: 100%;" placeholder="Enter Title" required value="<?php echo $Title;?>"> 
</div> 
 <div class="form-group">
    <label>Description</label>
    <textarea name="Description" row="10" class="form-control" style="width: 100%;" placeholder="Enter Description" required><?php echo $Description;?></textarea>
</div> 
 <div class="form-group">
    <label>PROGRAM/COURSE</label> 
    <select name="Course" style="width: 100%;" class="form-control select2"  tabindex="1" >
      <?php 
        $stmt = $conn->prepare("SELECT * FROM  tblcourse");
        $stmt->execute();  
        while($row = $stmt->fetch()){
          if ($Course==$row['Course']) {
            # code...
            echo '<option  SELECTED >'.$row['Course'].'</option>';
          }else{
            echo '<option>'.$row['Course'].'</option>';
          }
          
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
           if ($Subject==$row['Subject']) {
            # code...
            echo '<option  SELECTED >'.$row['Subject'].'</option>';
          }else{
            echo '<option>'.$row['Subject'].'</option>';
          } 
        }                     ?> 
  </select>  
  </div> 
<div class="form-group"> 
    <label>Attachment Image:</label> 
    <input type="file" name="Image1" value="" id="Image1"/> 
  </div>
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


