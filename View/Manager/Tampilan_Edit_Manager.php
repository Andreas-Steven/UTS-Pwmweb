<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UTS-Pemweb-00000020150</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Additonal/css/ViewCSS.css">

</head>

<body>
    <?php
        include "../../Model/Barang.php";

        $id = $_GET['id'];
        
        $BarangObject = new Barang();

        foreach($BarangObject->getItemByID($id) as $Row)
        {
    ?>
    <!--Main Navigation-->
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">UShop</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="../About.php">About</a></li>
            </ul>
            <!--<ul class="nav navbar-nav navbar-right">
                <li><a href="#" data-toggle="modal" disabled><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>-->
        </div>
        </nav> 
        <!--Main Navigation-->

        <div class="container vertical-center">
        <div class="container" style="border:0.5px solid #cecece; padd">    
            <h4 class="title">Add User</h4>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="text" class="form-control" placeholder="<?php echo $Row['item_id']; ?>" disabled>
                    <input type="hidden" class="form-control" name="ID" value="<?php echo $Row['item_id']; ?>">
                </div>

                <div class="form-group">
                    <label for="NB">Nama Barang</label>
                    <input type="text" class="form-control" name="NB"  value="<?php echo $Row['item_name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="SB">Stock Barang</label>
                    <input type="number" class="form-control" name="SB" value="<?php echo $Row['item_stock']; ?>" required>
                </div>

                <?php
                    if(isset($_COOKIE['STOCK_ERROR']))
                    {
                        echo "<div class='error' style='color:red;'>";
                            echo "<lable for='ERROR'>";
                                echo $_COOKIE['STOCK_ERROR'];
                                echo "<br>";
                            echo "</lable>";
                        echo "</div>";

                        setcookie('STOCK_ERROR', NULL, -1, "/");    
                    }
                ?>

                <div class="form-group">
                    <label for="HB">Harga Barang</label>
                    <input type="number" class="form-control" name="HB" value="<?php echo $Row['item_price']; ?>" required>
                </div>

                <?php
                    if(isset($_COOKIE['HARGA_ERROR']))
                    {
                        echo "<div class='error' style='color:red;'>";
                            echo "<lable for='ERROR'>";
                                echo $_COOKIE['HARGA_ERROR'];
                                echo "<br>";
                            echo "</lable>";
                        echo "</div>";

                        setcookie('HARGA_ERROR', NULL, -1, "/");    
                    }
                ?>

                <div class="form-group">
                    <label for="DES">Deskripsi</label>
                    <input type="text" class="form-control" name="DES" value="<?php echo $Row['item_desc']; ?>" required>

                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="button" value="Cancel" class="btn btn-primary" onClick="document.location.href='../../View/Manager/Tampilan_Manager.php';"/> <!--https://stackoverflow.com/questions/4553714/cancel-button-using-php-->
            </form>
            <br>
        </div>
        </div>
    <?php
        }
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if($_POST['HB'] != 0)
            {
                if($_POST['SB'] != 0)
                {
                    $BarangObject->UpdateItem($_POST['ID'], $_POST['NB'], $_POST['SB'], $_POST['HB'], $_POST['DES']);
                    header("Location: ../../View/Manager/Tampilan_Manager.php");
                }
                else
                {
                    setcookie('STOCK_ERROR', 'Stock Barang Tidak Boleh 0', time() + (86400 * 30), "/");

                    if($_POST['HB'] <= 0)
                    {
                        setcookie('HARGA_ERROR', 'Harga Barang Tidak Boleh 0', time() + (86400 * 30), "/");
                        header("Location: ../../View/Manager/Tampilan_Edit_Manager.php?id=$id");
                    }

                    header("Location: ../../View/Manager/Tampilan_Edit_Manager.php?id=$id");
                }
            }
            else
            {
                setcookie('HARGA_ERROR', 'Harga Barang Tidak Boleh 0', time() + (86400 * 30), "/");

                if($_POST['SB'] <= 0)
                {
                    setcookie('STOCK_ERROR', 'Stock Barang Tidak Boleh 0', time() + (86400 * 30), "/");
                    header("Location: ../../View/Manager/Tampilan_Edit_Manager.php?id=$id");
                }

                header("Location: ../../View/Manager/Tampilan_Edit_Manager.php?id=$id");
            }
        }
    ?>
</body>
</html>