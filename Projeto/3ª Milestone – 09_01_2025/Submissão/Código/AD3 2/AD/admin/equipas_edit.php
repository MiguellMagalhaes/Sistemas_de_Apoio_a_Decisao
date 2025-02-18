<?php
    include('security.php');
    include('include/header.php');
    include('include/navbar.php');
?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Equipas </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                
                $query = "SELECT * FROM equipas WHERE id_equipa='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="equipas.inc.php" method="POST">

                            <input type="hidden" name="edit_id_equipa" value="<?php echo $row['id_equipa'] ?>">

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="edit_nome_equipa" value="<?php echo $row['nome_equipa'] ?>" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Name URL</label>
                                <input type="text" name="edit_nome_url" value="<?php echo $row['nome_url'] ?>" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Região</label>
                                <input type="text" name="edit_regiao" value="<?php echo $row['regiao'] ?>"
                                    class="form-control" placeholder="Enter Regiao">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="edit_foto" value="<?php echo $row['foto'] ?>" 
                                class="form-control" placeholder="Enter Image">
                            </div>
                            
                            <a href="equipas.php" class="btn btn-danger"> CANCEL </a>
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