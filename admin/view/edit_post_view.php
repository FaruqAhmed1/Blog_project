<?php
if(isset($_GET['status'])){
    if($_GET['status']=='editpost'){
        $id = $_GET['id'];
        $postdata = $obj->get_post_info($id);

    }
}
if(isset($_POST['update_post'])){
     $msg =$obj->update_post($_POST);
}


?>


<div class="shadow p-5 m-5">
  <?php if(isset($msg)){echo $msg;} ?> 
<form  action="" method="POST" class="form" >
<input type="hidden" name="editpost_id" value="<?php echo $id ?>">
<div class="form-group">
    <label class=" mb-1" for="change_title"> Change Title</label><br>
    <input  class= "form-control" value="<?php echo $postdata['post_title'] ?> " name="change_title" class="py-4" id="change_title" type="text" />
</div>
<div class="form-group">
    <label class=" mb-1" for="change_content"> Change Content</label><br>
   <textarea class = "form-control" name="change_content" id="change_content" cols="30" rows="10"   ><?php echo $postdata['post_content'] ?></textarea>
</div>
<input type="submit" name="update_post" id="update_post" class= "btn btn-primary" value="Update Post">
</form>

 </div>