<?php
include('security.php');

$connection= mysqli_connect("localhost","root","","projetopap");

if(isset($_POST['registerbtn']))
{
    $name = $_POST['nome_equipa'];
    $url = $_POST['nome_url'];
    $regiao = $_POST['regiao'];
    $image = $_POST['foto'];
      
        $query = "INSERT INTO equipas (nome_equipa,nome_url,regiao,foto) VALUES ('$name','$url','$regiao','$image')";
        $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: equipas.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: equipas.php');  
            }
}


    if(isset($_POST['updatebtn']))
    {
    $id = $_POST['edit_id_equipa'];
    $name = $_POST['edit_nome_equipa'];
    $url = $_POST['edit_nome_url'];
    $regiao = $_POST['edit_regiao'];
    $foto=$_POST['edit_foto'];

    $query = "UPDATE equipas SET nome_equipa='$name', nome_url='$url', regiao='$regiao', foto='$foto' WHERE id_equipa='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: equipas.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: equipas.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM equipas WHERE id_equipa='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: equipas.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: equipas.php'); 
    }    
}
?>