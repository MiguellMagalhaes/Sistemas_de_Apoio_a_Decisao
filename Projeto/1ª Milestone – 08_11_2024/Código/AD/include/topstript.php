<?php
include_once $arrConfig['dir_site'].'/include/config.inc.php';
session_start();
  
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#page-top">Startup Base</a>
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
 
                    