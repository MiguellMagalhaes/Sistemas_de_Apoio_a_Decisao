<?php
    include('security.php');
    include('include/header.php');
    include('include/navbar.php');
    include('include/topbar.php');
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="jogadores.inc.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nome </label>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label> Idade </label>
                <input type="text" name="idade" class="form-control" placeholder="Idade">
            </div>
            <div class="form-group">
                <label>Peso</label>
                <input type="text" name="peso" class="form-control" placeholder="Peso">
            </div>
            <div class="form-group">
                <label>Nacionalidade</label>
                <input type="text" name="nacionalidade" class="form-control" placeholder="Nacionalidade">
            </div>
            <div class="form-group">
                <label> Posição </label>
                <input type="text" name="posicao" class="form-control" placeholder="Posição">
            </div>
            <div class="form-group">
                <label> Pontos Por Jogo </label>
                <input type="text" name="pontos_pj" class="form-control" placeholder="Pontos">
            </div>
            <div class="form-group">
                <label> Image</label>
                <input type="file" name="foto" class="form-control" placeholder="image">
            </div>
            <div class="form-group">
                <label>Número Camisola </label>
                <input type="text" name="num_cami" class="form-control" placeholder="Camisola">
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label>Id Equipa </label>
                <input type="text" name="id_equipa" class="form-control" placeholder="id_equipa">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                                    Add Player 
                            </button>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                $query = "SELECT * FROM jogadores";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <thead>
                        <tr>                         
                            <th>Name</th>
                            <th>Age </th>
                            <th>Weight</th>
                            <th>Nacionality</th>
                            <th>Position</th>
                            <th>Points Per Game</th>
                            <th>Image</th>
                            <th>Jersey Number</th>
                            <th>Descrição</th>
                            <th>Id Equipa</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                                <td><?php  echo $row['nome']; ?></td>
                                <td><?php  echo $row['idade']; ?></td>
                                <td><?php  echo $row['peso']; ?>kg</td>
                                <td><?php  echo $row['nacionalidade']; ?></td>
                                <td><?php  echo $row['posicao']; ?></td>
                                <td><?php  echo $row['pontos_pj']; ?></td>
                                <td><?php  echo $row['foto']; ?></td>
                                <td><?php  echo $row['num_cami']; ?></td>
                                <td><?php  echo $row['descricao']; ?></td>
                                <td><?php  echo $row['id_equipa']; ?></td>
                                <td>
                                    <form action="jogadores_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id_jogador']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="jogadores.inc.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id_jogador']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
    include('include/scripts.php');
    include('include/footer.php');
?>
<script>CKEDITOR.replace('descricao');</script>
