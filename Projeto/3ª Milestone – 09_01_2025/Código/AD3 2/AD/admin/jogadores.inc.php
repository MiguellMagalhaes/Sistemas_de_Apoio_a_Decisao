<?php
include('security.php');

$connection= mysqli_connect("localhost","root","","projetopap");

if(isset($_POST['registerbtn']))
{
    $name = $_POST['nome'];
    $age = $_POST['idade'];
    $peso = $_POST['peso'];
    $nacio = $_POST['nacionalidade'];
    $posicao = $_POST['posicao'];
    $pontospj=$_POST['pontos_pj'];
    $foto=$_POST['foto'];
    $num_cami=$_POST['num_cami'];
    $descricao=$_POST['descricao'];
    $id_equipa=$_POST['id_equipa'];
      
        $query = "INSERT INTO jogadores (nome,idade,peso,nacionalidade,posicao,pontos_pj,foto,num_cami,descricao,id_equipa) VALUES ('$name','$age','$peso','$nacio','$posicao','$pontospj','$foto','$num_cami','$descricao','$id_equipa')";
        $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: jogadores.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: jogadores.php');  
            }
}


    if(isset($_POST['updatebtn']))
    {
    $id = $_POST['edit_id_jogador'];
    $name = $_POST['edit_nome'];
    $age = $_POST['edit_idade'];
    $peso = $_POST['edit_peso'];
    $nacio=$_POST['edit_nacionalidade'];
    $posicao = $_POST['edit_posicao'];
    $pontospj = $_POST['edit_pontos_pj'];
    $foto = $_POST['edit_foto'];
    $num_cami=$_POST['edit_num_cami'];
    $descricao=$_POST['edit_descricao'];
    $id_equipa=$_POST['edit_id_equipa'];

    $query = "UPDATE jogadores SET nome='$name', idade='$age', peso='$peso', nacionalidade='$nacio', posicao='$posicao', pontos_pj='$pontospj',foto='$foto', num_cami='$num_cami',descricao='$descricao', id_equipa='$id_equipa'  WHERE id_jogador='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: jogadores.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: jogadores.php'); 
    }
}

if(isset($_POST['delete_btn']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM jogadores WHERE id_jogador='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Deleted";
        $_SESSION['status_code'] = "success";
        header('Location: jogadores.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT DELETED";       
        $_SESSION['status_code'] = "error";
        header('Location: jogadores.php'); 
    }    
}
?>