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
      <form action="redesociais.inc.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nome </label>
                <input type="text" name="rede_nome" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
                <label> URL </label>
                <input type="text" name="rede_url" class="form-control" placeholder="URL">
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
                                    Add Social Media
                            </button>
                            </h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <?php
                $query = "SELECT * FROM redesociais";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <thead>
                        <tr>                         
                            <th>Name</th>
                            <th>URL </th>
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
                                <td><?php  echo $row['rede_nome']; ?></td>
                                <td><?php  echo $row['rede_url']; ?></td>
                                <td>
                                    <form action="redesociais_edit.php" method="post">
                                        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="redesociais.inc.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
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