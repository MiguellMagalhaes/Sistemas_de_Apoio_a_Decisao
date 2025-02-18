<?php
include('security.php');

$connection= mysqli_connect("localhost","root","","projetopap");

if(isset($_POST['registerbtn']))
{
    $name = $_POST['menu_nome'];
    $url = $_POST['menu_url'];
    $pai = $_POST['pai'];
    $ativo = $_POST['ativo'];
   
        $query = "INSERT INTO menu (menu_nome,menu_url,pai,ativo) VALUES ('$name','$url','$pai','$ativo')";
        $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: menu.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: menu.php');  
            }
        
}


    if(isset($_POST['updatebtn']))
    {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_menu_nome'];
    $url = $_POST['edit_menu_url'];
    $pai = $_POST['edit_pai'];
    $ativo=$_POST['edit_ativo'];
    
    $query = "UPDATE menu SET menu_nome='$name', menu_url='$url', pai='$pai', ativo='$ativo' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: menu.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: menu.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM menu WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: menu.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: menu.php'); 
    }    
}
?>