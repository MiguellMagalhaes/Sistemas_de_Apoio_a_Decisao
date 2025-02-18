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
                
                $query = "SELECT * FROM produtos WHERE id='$id'";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="produtos.inc.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label> Name </label>
                                <input type="text" name="edit_nome" value="<?php echo $row['nome'] ?>" class="form-control"
                                    placeholder="Enter Name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="edit_descricao" value="<?php echo $row['descricao'] ?>" class="form-control"
                                    placeholder="Enter Description">
                            </div>
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="edit_preco" value="<?php echo $row['preco'] ?>"
                                    class="form-control" placeholder="Enter Price">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="edit_foto" value="<?php echo $row['foto'] ?>" 
                                class="form-control" placeholder="Enter Foto">
                            </div>
                            <div class="form-group">
                                <label>Stars</label>
                                <input type="text" name="edit_stars" value="<?php echo $row['stars'] ?>"
                                    class="form-control" placeholder="Enter Stars">
                            

                            <a href="produtos.php" class="btn btn-danger"> CANCEL </a>
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