<?php
include('security.php');

$connection= mysqli_connect("localhost","root","","projetopap");

if(isset($_POST['registerbtn']))
{
    $name = $_POST['rede_nome'];
    $url = $_POST['rede_url'];
    $preco = $_POST['ativo'];
      
        $query = "INSERT INTO redesociais (rede_nome,rede_url,ativo) VALUES ('$name','$url','$ativo')";
        $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: redesociais.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: redesociais.php');  
            }
}


    if(isset($_POST['updatebtn']))
    {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_rede_nome'];
    $url = $_POST['edit_rede_url'];
    $ativo = $_POST['edit_ativo'];

    $query = "UPDATE redesociais SET rede_nome='$name', rede_url='$url', ativo='$ativo' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: redesociais.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: redesociais.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM redesociais WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: redesociais.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: redesociais.php'); 
    }    
}
?>