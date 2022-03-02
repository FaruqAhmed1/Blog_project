<?php 
if(isset($_POST['add_cat'])){
    $return_msg  = $obj->add_category($_POST);
}


?>
<h2>Add Category Page</h2>
<form action="" method="POST">
<?php if(isset($return_msg)){echo $return_msg;} ?>
<div class="form-group">
    <label class=" mb-1" for="cat_name">Category Name</label>
    <input name="cat_name" class="form-control py-4" id="cat_name" type="text" />
</div>
<div class="form-group">
    <label class=" mb-1" for="cat_des">Category Description</label>
    <input name="cat_des" class="form-control py-4" id="cat_name" type="text" />
</div>
<input type="submit" name="add_cat" value="Add Category" class= "form-control btn btn-success btn-block">
</form>




