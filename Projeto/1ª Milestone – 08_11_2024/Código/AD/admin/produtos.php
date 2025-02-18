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
      <form action="produtos.inc.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nome </label>
                <input type="text" name="name" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label> Description </label>
                <input type="text" name="desc" class="form-control" placeholder="Desc">
            </div>
            <div class="form-group">
                <label>Preco</label>
                <input type="text" name="preco" class="form-control" placeholder="Preco">
            </div>
            <div class="form-group">
                <label>Photo </label>
                <input type="files" name="foto" class="form-control" placeholder="Foto">
            </div>
            <div class="form-group">
                <label> Stars </label>
                <input type="text" name="stars" class="form-control" placeholder="Stars">
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
                                    Add Products 
                            </button>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                $query = "SELECT * FROM produtos";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <thead>
                        <tr>                         
                            <th>Name</th>
                            <th>Description </th>
                            <th>Preço</th>
                            <th>Photo</th>
                            <th>Stars</th>
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
                                <td><?php  echo $row['descricao']; ?></td>
                                <td><?php  echo $row['preco']; ?>€</td>
                                <td><?php  echo $row['foto']; ?></td>
                                <td><?php  echo $row['stars']; ?></td>
                                <td>
                                    <form action="produtos_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['product_id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="produtos.inc.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['product_id']; ?>">
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