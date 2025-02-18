<?php
session_start();
include('db/dbconfig.php');

if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: db/dbconfig.php");
}


?>