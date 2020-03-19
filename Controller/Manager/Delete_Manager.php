<?php
    include "../../Model/Barang.php";

    $ItemID = $_GET['id'];

    $BarangObject = new Barang();
    $BarangObject->DeleteItem($ItemID);

    header("location: ../../View/Manager/Tampilan_Manager.php");
?>