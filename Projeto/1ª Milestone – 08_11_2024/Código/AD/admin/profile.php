<?php

session_start();

if (!isset($_SESSION["id"])) {
    header("Location: index.php");
}

include 'db/dbconfig.php';

if (isset($_POST["submit"])) {
    $user = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, md5($_POST["password"]));
    $cpassword = mysqli_real_escape_string($conn, md5($_POST["cpassword"]));

    if ($password === $cpassword) {
        $foto_name = mysqli_real_escape_string($conn, $_FILES["foto"]["name"]);
        $foto_tmp_name = $_FILES["foto"]["tmp_name"];
        $foto_size = $_FILES["foto"]["size"];
        $foto_new_name = rand() . $foto_name;

        if ($photo_size > 5242880) {
            echo "<script>alert('Photo is very big. Maximum photo uploading size is 5MB.');</script>";
        } else {
            $sql = "UPDATE register SET username='$user', password='$password', foto='$foto_new_name' WHERE id='{$_SESSION["id"]}'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Profile Updated successfully.');</script>";
                move_uploaded_file($foto_tmp_name, "uploads/" . $foto_new_name);
            } else {
                echo "<script>alert('Profile can not Updated.');</script>";
                echo  $conn->error;
            }
        }
    } else {
        echo "<script>alert('Password not matched. Please try again.');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>

<body class="profile-page">
    <div class="wrapper">
        <p>Wanna logout?
            <a href="logout.php">Click Here</a>
        </p>
        <h2>Profile</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <?php

            $sql = "SELECT * FROM register WHERE id='{$_SESSION["id"]}'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
                    <div class="inputBox">
                        <input type="text" id="username" name="username" placeholder="Username" value="<?php echo $row['username']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <input type="email" id="email" name="email" placeholder="Email Address" value="<?php echo $row['email']; ?>" disabled required>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="password" name="password" placeholder="Password" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" value="<?php echo $row['password']; ?>" required>
                    </div>
                    <div class="inputBox">
                        <label for="foto">Photo</label>
                        <input type="file" accept="image/*" id="foto" name="foto" required>
                    </div>
                    <img src="uploads/<?php echo $row["foto"]; ?>" width="150px" height="auto" alt="">
            <?php
                }
            }

            ?>
            <div>
                <button type="submit" name="submit" class="btn">Update Profile</button>
            </div>
        </form>
    </div>
</body>

</html>