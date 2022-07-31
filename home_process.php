<?php
     session_start();
    if (!isset($_SESSION['user_id'])){
    echo "<script>alert('You are not logged In!'); window.location='login.php';</script>";
    }

    include 'DBlibrary.php';
    $db = new DBlibrary();
    $user_id=$_SESSION['user_id'];
    $text_post=($_POST["text_post"]);
    $img="";
    $vid="";
    $attch="";
    $deptfilter=($_POST["deptfilter"]);
    $status=1;
    /********* POST IMAGE UPLOAD ****************/
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
    {
        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        if(in_array($ext,$extension))
        {
            /* if(!file_exists("photo_gallery/".$txtGalleryName."/".$file_name))
            {
                move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"photo_gallery/".$txtGalleryName."/".$file_name);
            }
            else
            {*/
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;
            //$img = $filename.time().".".$ext;
            $img=$img.";".$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"postimage/".$newFileName);
            }
        
        else
        {
            echo "invalid extension";	
        }
    }
    
/******************* POST VIDEO UPLOAD ************************/
    $allowedexts=array("mp4");
    $temp=explode(".",$_FILES["vfiles"]["name"]);
    $extension=end($temp);
    if($extension!=""){
        if(in_array($extension,$allowedexts) && ($_FILES["vfiles"]["size"]<20971520))
        {
            if($_FILES["vfiles"]["error"]>0)
            {
                echo "Error uploading video";
            }
    
            else
            {
                $newfilename = 'vid'.'_'.$user_id.'_'.round(microtime(true)) . '.' . $extension;
                $vid = 'vid'.'_'.$user_id.'_'.round(microtime(true)) . '.' . $extension;
                move_uploaded_file($_FILES["vfiles"]["tmp_name"],"postvideo/".$newfilename);
            }
        }
    
        else
        {
            echo "Sorry! Invalid File";
        }
    }
/********************* DOC FILES UPLOAD *************************/
    $allowedexts=array("pdf","txt","doc","docx",".zip",".rar");
    $temp=explode(".",$_FILES["docfiles"]["name"]);
    $extension=end($temp);
    if($extension!=""){
        if(in_array($extension,$allowedexts) && ($_FILES["docfiles"]["size"]<20971520))
        {
            if($_FILES["docfiles"]["error"]>0)
            {
                echo "Error uploading video";
            }
    
            else
            {
                $newfilename = 'doc'.'_'.$user_id.'_'.round(microtime(true)) . '.' . $extension;
                $attch = 'doc'.'_'.$user_id.'_'.round(microtime(true)) . '.' . $extension;
                move_uploaded_file($_FILES["docfiles"]["tmp_name"],"postdocs/".$newfilename);
                
                
                
            }
        }
    
        else
        {
            echo "Sorry! Invalid File";
        }
    }
    $result=$db->postUpload($user_id,$text_post,$img,$vid,$attch,$deptfilter,$status);
    header('Location: home_main.php');
?>