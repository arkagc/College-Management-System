<?php
     session_start();
     if (!isset($_SESSION['user_id'])){
        echo "<script>alert('You are not logged In!'); window.location='login.php';</script>";
     }

    include 'DBlibrary.php';
    $db = new DBlibrary();
    $post_id=$_GET['post_id'];
    $user=$_GET['user_id'];

    $row=$db->getUserDetailHome($user);
    $first_name=$row['first_name'];
    $middle_name=$row['middle_name'];
    $last_name=$row['last_name'];
    $comm=($_POST['comm']);
    
    $comment=$db->insertComment($post_id, $user, $first_name, $middle_name, $last_name, $comm);
    header('Location: home_main.php');
?>