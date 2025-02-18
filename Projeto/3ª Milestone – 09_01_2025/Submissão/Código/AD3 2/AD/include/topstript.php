<?php
include_once $arrConfig['dir_site'].'/include/config.inc.php';
session_start();
  
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
            <img src=".../assets/img/LOGOTIPO_optimized.png" alt="" height="50" style="margin-right: 8px; width: auto;" />
                <span>Startup Base</span>
            </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#projects">Projects</a></li>
        <li class="nav-item"><a class="nav-link" href="#signup">Contact</a></li>
        
        <?php
        if ((isset($_SESSION["usertype"])) && ($_SESSION["usertype"] == "user")) {
            echo '<li class="nav-item dropdown" style="position: relative;">';
            echo '<a class="nav-link" style="cursor: pointer; color: white;" onclick="toggleMenu()">'; 
            echo '<i class="fa fa-user-circle" style="font-size: 24px; margin-right: 5px;"></i>'; // Ícone de perfil
            echo $_SESSION['username'];
            echo '</a>';

            // Menu dropdown
            echo '<div id="profileMenu" style="
                        display: none;
                        position: absolute;
                        top: 100%;
                        right: 0;
                        background-color: #333;
                        color: white;
                        min-width: 150px;
                        box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
                        z-index: 1;
                        border-radius: 5px;
                        overflow: hidden;
                    ">';
            echo '<a href="areareservada.php" style="
                        color: white;
                        text-decoration: none;
                        display: block;
                        padding: 10px;
                        border-bottom: 1px solid #555;">Escolher Incubadora</a>';
            echo '<a href="admin/logout.php" style="
                        color: white;
                        text-decoration: none;
                        display: block;
                        padding: 10px;">Logout</a>';
            echo '</div>';
            echo '</li>';
        } else {
            echo '<li class="nav-item"><a class="nav-link" href="admin/login.php">Login</a></li>';
            $query = "UPDATE menu SET ativo='0' WHERE menu_nome='Store'";
            $res = my_query($query);
        }
        ?>
    </ul>
</div>
            </div>
        </nav>
                        
                        <?php
                        /*
                            if ((isset($_SESSION["usertype"])) && ($_SESSION["usertype"]=="user"))
                            {
                                echo "<p style='color:white;'>";
                                echo "Bem vindo " .$_SESSION['username']."";
                                echo "</p>";
                                echo '<a style="color:white;" href="admin/logout.php"> Logout </a>';
                                $query = "UPDATE menu SET ativo='1' WHERE menu_nome='Store'";
                                $res = my_query($query);
                            }
                            else
                            { 
                                echo '<li><i class="fa fa-user"></i> <a href="admin/login.php">Login</a></li>';
                                $query = "UPDATE menu SET ativo='0' WHERE menu_nome='Store'";
                                $res = my_query($query);
                            }
                        */
                        ?>
 
                    