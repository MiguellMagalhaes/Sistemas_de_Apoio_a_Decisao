<?php
include('security.php');

$connection= mysqli_connect("localhost","root","","projetopap");

if(isset($_POST['registerbtn']))
{
    $name = $_POST['nome'];
    $desc = $_POST['descricao'];
    $preco = $_POST['preco'];
    $foto = $_POST['foto'];
    $stars = $_POST['stars'];
      
        $query = "INSERT INTO produtos (nome,descricao,preco,foto,stars) VALUES ('$name','$desc','$preco','$foto','$stars')";
        $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: produtos.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: produtos.php');  
            }
}


    if(isset($_POST['updatebtn']))
    {
    $id = $_POST['edit_id'];
    $name = $_POST['edit_nome'];
    $desc = $_POST['edit_descricao'];
    $preco = $_POST['edit_preco'];
    $foto=$_POST['edit_foto'];
    $stars = $_POST['edit_stars'];

    $query = "UPDATE produtos SET nome='$name', descricao='$desc', preco='$preco', foto='$foto', stars='$stars' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: produtos.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: produtos.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM produtos WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: produtos.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: produtos.php'); 
    }    
}
?>