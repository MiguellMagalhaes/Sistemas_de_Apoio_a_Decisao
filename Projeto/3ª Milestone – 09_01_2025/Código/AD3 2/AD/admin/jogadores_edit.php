<?php
    include('security.php');
    include('include/header.php');
    include('include/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM jogadores WHERE id_jogador='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="jogadores.inc.php" method="POST">

                            <input type="hidden" name="edit_id_jogador" value="<?php echo $row['id_jogador'] ?>">

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="edit_nome" value="<?php echo $row['nome'] ?>" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Age</label>
                                <input type="text" name="edit_idade" value="<?php echo $row['idade'] ?>" class="form-control"
                                    placeholder="Enter Age">
                            </div>
                            <div class="form-group">
                                <label>Weight</label>
                                <input type="text" name="edit_peso" value="<?php echo $row['peso'] ?>"
                                    class="form-control" placeholder="Enter Weight">
                            </div>
                            <div class="form-group">
                                <label>Nacionality</label>
                                <input type="text" name="edit_nacionalidade" value="<?php echo $row['nacionalidade'] ?>" 
                                class="form-control" placeholder="Enter Nacionality">
                            </div>
                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" name="edit_posicao" value="<?php echo $row['posicao'] ?>"
                                    class="form-control" placeholder="Enter Position">
                            </div>
                            <div class="form-group">
                                <label>Points Per Game</label>
                                <input type="text" name="edit_pontos_pj" value="<?php echo $row['pontos_pj'] ?>" class="form-control"
                                    placeholder="Enter Points">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="edit_foto" value="<?php echo $row['foto'] ?>"
                                    class="form-control" placeholder="Enter Image">
                            </div>
                            <div class="form-group">
                                <label>Jersey Number</label>
                                <input type="text" name="edit_num_cami" value="<?php echo $row['num_cami'] ?>"
                                    class="form-control" placeholder="Enter Jersey Number">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="edit_descricao" id="edit_descricao" value="<?php echo $row['descricao'] ?>"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Id Equipa</label>
                                <input type="text" name="edit_id_equipa" value="<?php echo $row['id_equipa'] ?>"
                                    class="form-control" placeholder="Enter Jersey Number">
                            </div>
                            

                            <a href="jogadores.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>
<script>CKEDITOR.replace('edit_descricao');</script>
<?php
    include('include/scripts.php');
    include('include/footer.php');
?>