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
                
                $query = "SELECT * FROM news WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="news.inc.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label> Title </label>
                                <input type="text" name="edit_title" value="<?php echo $row['title'] ?>" class="form-control"
                                    placeholder="Enter Title">
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="edit_date" value="<?php echo $row['date'] ?>" class="form-control"
                                    placeholder="Enter Date">
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="edit_image" value="<?php echo $row['image'] ?>"
                                    class="form-control" placeholder="Enter Image">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="edit_descricao" id="edit_descricao" value="<?php echo $row['descricao'] ?>"></textarea>
                            </div>

                            <a href="news.php" class="btn btn-danger"> CANCEL </a>
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