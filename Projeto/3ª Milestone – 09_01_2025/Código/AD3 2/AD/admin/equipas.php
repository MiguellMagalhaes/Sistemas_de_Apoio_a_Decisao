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
      <form action="equipas.inc.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Name </label>
                <input type="text" name="nome_equipa" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label>Name URL</label>
                <input type="text" name="nome_url" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label>Region</label>
                <input type="text" name="regiao" class="form-control" placeholder="Região">
            </div>
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="foto" class="form-control" placeholder="Imagem">
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
                                    Add Team
                            </button>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                $query = "SELECT * FROM equipas";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <thead>
                        <tr>                         
                            <th>Name</th>
                            <th>Name URL </th>
                            <th>Region</th>
                            <th>Image</th>
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
                                <td><?php  echo $row['nome_equipa']; ?></td>
                                <td><?php  echo $row['nome_url']; ?></td>
                                <td><?php  echo $row['regiao']; ?></td>
                                <td><?php  echo $row['foto']; ?></td>
                                <td>
                                    <form action="equipas_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id_equipa']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="equipas.inc.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id_equipa']; ?>">
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