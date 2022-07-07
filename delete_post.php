<?php
     session_start();


        if (!isset($_SESSION['user_id'])){
        echo "<script>alert('You are not logged In!'); window.location='login.php';</script>";
        }

    include 'DBlibrary.php';
    $db = new DBlibrary();
    $post_id=$_GET['post_id'];
    //echo $post_id;
    //die;
    $delpost=$db->deletePost($post_id);
    header('Location: profile.php');
?>