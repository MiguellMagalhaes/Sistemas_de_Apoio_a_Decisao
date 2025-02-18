<?php
    session_start();// Inicia a sessão, se ainda não tiver sido iniciada.
    $_SESSION = array();
    session_destroy();
    unset($_SESSION['username']);
    header('Location: ../index.php');
?>
