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
                
                $query = "SELECT * FROM redesociais WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="redesociais.inc.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="edit_rede_nome" value="<?php echo $row['rede_nome'] ?>" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" name="edit_rede_url" value="<?php echo $row['rede_url'] ?>" class="form-control"
                                    placeholder="Enter URL">
                            </div>
                        
                            <a href="redesociais.php" class="btn btn-danger"> CANCEL </a>
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
<?php
    include('include/scripts.php');
    include('include/footer.php');
?>