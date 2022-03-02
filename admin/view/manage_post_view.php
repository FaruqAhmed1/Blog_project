<?php 

 $posts = $obj->display_post();

?>

<h2>Manage Post Page</h2>
<div class= "table-responsive"> 
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Title</td>
            <td>Content</td>
            <td>Thumbail</td>
            <td>Author</td>
            <td>Date</td>
            <td>Categry</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        <?php while($postdata = mysqli_fetch_assoc($posts)) { ?>
        <tr>
            <td><?php echo $postdata['post_id'] ?></td>
            <td><?php echo $postdata['post_title'] ?></td>
            <td><?php echo $postdata['post_content'] ?></td>
            <td><img style="width: 50px;" src="../upload/<?php echo $postdata['post_img'] ?>" >
            <br>
            <a href="edit_img.php?status=editimg&&id=<?php echo $postdata['post_id'] ?>">Change</a>
        
           </td>
            <td><?php echo $postdata['post_author'] ?></td>
            <td><?php echo $postdata['post_date'] ?></td>
            <td><?php echo $postdata['cat_name'] ?></td>
            <td><?php echo $postdata['post_status'] ?></td>
            <td>
                <a class = "btn btn-primary" href="edit_post.php?status=editpost&&id=<?php echo $postdata['post_id'] ?>">Edit</a>
                <a class = "btn btn-danger" href="#">Delete</a>
            </td>
        </tr>
    </tbody>
    <?php } ?>

</table>
</div>