<?php
    include "../../Model/User.php";

    $UserID = $_GET['id'];

    $UserObject = new User();
    $UserObject->DeleteUser($UserID);

    header("location: ../../View/Admin/Tampilan_Admin.php");
?>