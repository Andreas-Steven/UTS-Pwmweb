<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        setcookie('STATUS', NULL, -1, "/");
        header("Location: ../View/Tampilan_Login.php"); 
    }
?>