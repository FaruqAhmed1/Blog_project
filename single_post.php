<?php 
include ("admin/Class/function.php");
$obj = new adminBlog();
 $getcat= $obj->display_category();

 if(isset($_GET['view'])){
     if($_GET['view']='postview'){
         $id = $_GET['id'];
         $post=$obj->get_post_info($id);
     }
 }

?>


<?php include_once("includes/head.php") ?>

<body>

    <?php include_once("includes/preloader.php") ?>

    <?php include_once("includes/header.php") ?>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <?php include_once("includes/banner.php") ?>

    <?php include_once("includes/cta.php") ?>


    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                   <h2><?php echo $post['post_title'] ?></h2>
                 
                </div>
                <?php include_once("includes/sidebar.php") ?>
            </div>
        </div>
    </section>


    <?php include_once("includes/footer.php") ?>

    <!-- Bootstrap core JavaScript -->
    <?php include_once("includes/script.php") ?>