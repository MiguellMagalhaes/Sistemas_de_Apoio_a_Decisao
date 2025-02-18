<?php
include('security.php');

$connection= mysqli_connect("localhost","root","","projetopap");

if(isset($_POST['registerbtn']))
{
    $title = $_POST['title'];
    $data = $_POST['date'];
    $image = $_POST['image'];
    $descricao = $_POST['descricao'];
    
        $query = "INSERT INTO news (title,date,image,descricao) VALUES ('$title','$data','$image','$descricao')";
        $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: news.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: news.php');  
            }
}


    if(isset($_POST['updatebtn']))
    {
    $id = $_POST['edit_id'];
    $title = $_POST['edit_title'];
    $data = $_POST['edit_date'];
    $image = $_POST['edit_image'];
    $descricao=$_POST['edit_descricao'];

    $query = "UPDATE news SET title ='$title', date='$data', image='$image', descricao='$descricao' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: news.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: news.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM news WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: news.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: news.php'); 
    }    
}
?>