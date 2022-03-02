<?php 
class adminBlog{
    private $conn;
    public function __construct()
    {
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = "";
        $dbname= 'blogproject';
        $this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
        if(!$this->conn){
            die("Database Connection Error!!");
        }
    }
    public function admin_login($data){
        $admin_email = $data['admin_email'];
        $admin_pass = md5($data['admin_pass']);

        $query  ="SELECT * FROM admin_info WHERE admin_email = '$admin_email' && admin_pass = '$admin_pass' ";
        if(mysqli_query($this->conn,$query)){
            $admin_info = mysqli_query($this->conn,$query);

            if($admin_info){
                header("location:dashboard.php");
                $admin_data = mysqli_fetch_assoc($admin_info);
                session_start();
                $_SESSION ['adminID'] = $admin_data['id'];
                $_SESSION['admin_name'] = $admin_data['admin_name'];
            }
        }


    }

    public function adminLogout(){
        unset($_SESSION ['adminID']);
        unset($_SESSION['admin_name']);
        header('location: index.php');
    }

    public function add_category($data){
        $cat_name= $data['cat_name'];
        $cat_des = $data ['cat_des'];
        $query  = "INSERT INTO category (cat_name,cat_des) VALUE ('$cat_name','$cat_des') ";
        if(mysqli_query($this->conn,$query)){
            return "Categry added successfully ";
        }

    }
    public function display_category(){
        $query = "SELECT * FROM category";
        if(mysqli_query($this->conn,$query)){
            $category = mysqli_query($this->conn,$query);
            return $category;
        }
    }
    public function delete_category($id){
        $query = "DELETE FROM category WHERE cat_id= $id";
        if(mysqli_query($this->conn,$query)){
            return " Delete Successfully";
        }
    }
    public function add_post($data){
        $post_title = $data['post_title'];
        $post_content = $data['post_content'];
        $post_img = $_FILES['post_img']['name'];
        $post_img_tmp = $_FILES['post_img']['tmp_name'];
        $post_category = $data['post_category'];
        $post_summary = $data['post_summary'];
        $post_tag = $data['post_tag'];
        $post_status = $data['post_status'];
        
        $query = "INSERT INTO posts(post_title,post_content,post_img,post_ctg,post_author,post_date,post_comment_count,post_summary,post_tag,post_status) VALUE ('$post_title','$post_content','$post_img',$post_category,'Faruq',now(),3,'$post_summary','$post_tag',$post_status)";
        if(mysqli_query($this->conn,$query)){
            move_uploaded_file($post_img_tmp,'../upload/'.$post_img);
            return " Post Added Successfully ";

        }

        
    }
    public function display_post(){
        $query = "SELECT * FROM post_with_ctg";
        if(mysqli_query($this->conn,$query)){
            $posts = mysqli_query($this->conn,$query);
            return $posts;
        }
    }
    public function display_post_public(){
        $query = "SELECT * FROM post_with_ctg WHERE post_status=1";
        if(mysqli_query($this->conn,$query)){
            $posts = mysqli_query($this->conn,$query);
            return $posts;
        }
    }
    public function edit_img($data){
        $id = $data['editimg_id'];
        $imgname = $_FILES['change_img']['name'];
        $tmp_name =$_FILES['change_img']['tmp_name'];

        $query = "UPDATE posts SET post_img= '$imgname' WHERE post_id=$id";

        if(mysqli_query($this->conn,$query)){
            move_uploaded_file($tmp_name,'../upload/'.$imgname);
        }
    }
    
    public function get_post_info($id){
        $query = "SELECT * FROM post_with_ctg WHERE post_id = $id ";
        if(mysqli_query($this->conn,$query)){
            $post_info =  mysqli_query($this->conn,$query);
            $post = mysqli_fetch_assoc($post_info);
            return $post;
        }
    }
    public function update_post($data){
        $id = $data['editpost_id'];
        $post_title = $data['change_title'];
        $post_content = $data['change_content'];

        $query = "UPDATE posts SET post_title='$post_title',post_content = '$post_content' WHERE post_id = $id";
        if(mysqli_query($this->conn,$query)){
            return " Post Update Successfully";
 
        }

    }
    
}





?>