 <?php 
 
 if(isset($_GET['status'])){
     if($_GET['status']='editimg'){
         $id = $_GET['id'];
     }
 }
 if(isset($_POST['change_img_btn'])){
     $msg = $obj->edit_img($_POST);
 }
 
 ?>
 
 <div class="shadow p-5 m-5">
   <?php if(isset($msg)){ echo $msg;} ?> 
<form  action="" method="POST" class="form" enctype="multipart/form-data">
<input type="hidden" name="editimg_id" value="<?php echo $id ?>">
<div class="form-group">
    <label class=" mb-1" for="change_img"> Change  Thumbnail</label><br>
    <input name="change_img" class="py-4" id="change_img" type="file" />
</div>
<input type="submit" name="change_img_btn" id="change_img_btn" class= "btn btn-primary" value="Change Thumbnail">
</form>

 </div>