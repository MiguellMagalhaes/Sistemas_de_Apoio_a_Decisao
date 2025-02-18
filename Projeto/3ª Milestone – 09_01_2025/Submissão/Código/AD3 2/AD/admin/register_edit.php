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
                
                $query = "SELECT * FROM register WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="code.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label> User Name </label>
                                <input type="text" name="edit_username" value="<?php echo $row['username'] ?>" class="form-control"
                                    placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="edit_email" value="<?php echo $row['email'] ?>" class="form-control"
                                    placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="edit_password" value="<?php echo $row['password'] ?>"
                                    class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label>User Type</label>
                                <select name="update_usertype" class="form-control">
                                    <?php
                                    if($row['usertype'] == 'admin')
                                    {
                                        echo "<option value=".$row['usertype'].">".$row['usertype']."</option>
                                              <option value=user>User</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=".$row['usertype'].">".$row['usertype']."</option>
                                              <option value=admin>Admin</option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <a href="register.php" class="btn btn-danger"> CANCEL </a>
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