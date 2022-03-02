<?php
  $categoryName = $obj->display_category();
 if(isset($_POST['add_post'])){
     $msg =  $obj->add_post($_POST);
 }
?>


<h2>Add Post Page</h2>
<?php if(isset($msg)){ echo $msg; } ?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label class=" mb-1" for="post_title"> Post Title</label>
    <input name="post_title" class="form-control py-4" id="post_title" type="text" />
</div>
<div class="form-group">
    <label class=" mb-1" for="post_cntent"> Post Content</label>
    <textarea class= " form-control py-4" name="post_content" id="post_content" cols="30" rows="10"></textarea>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_img"> Post Thumbnail</label><br>
    <input name="post_img" class="py-4" id="post_img" type="file" />
</div>
<div class="form-group">
    <label class=" mb-1" for="post_category">Select post category</label>
    <select class = "form-control" name="post_category" id="post_category">
    <?php while($category = mysqli_fetch_assoc($categoryName)) { ?>
        <option value="<?php echo $category['cat_id'] ?>"><?php echo $category['cat_name'] ?></option>
        <?php }?>
    </select>
</div>
<div class="form-group">
    <label class=" mb-1" for="post_summary"> Post_summary</label>
    <input name="post_summary" class="form-control py-4" id="post_summary" type="text" />
</div>
<div class="form-group">
    <label class=" mb-1" for="post_tag">Post Tag</label>
    <input name="post_tag" class="form-control py-4" id="post_tag" type="text" />
</div>
<div class="form-group">
    <label class=" mb-1" for="post_status">Post Status</label>
   <select class = "form-control" name="post_status" id="post_status">
       <option value="1">Published</option>
       <option value="0">Unpublished</option>
   </select>
</div>

<input type="submit" name="add_post" value="Add Post" class= "form-control btn btn-success btn-block">
</form>