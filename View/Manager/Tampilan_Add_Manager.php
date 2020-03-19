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

<script type="text/javascript">
$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});
});
</script>
</head>

<body>
    <?php
        include "../../Model/Barang.php";
        $BarangObject = new Barang();
        
        foreach($BarangObject->getLastID() as $Row)
        {
            $LastIDString = $Row['item_id'];
        }

        $LastID = $BarangObject->getAutoIncrement($LastIDString);
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
            <h4 class="title">Tambah <b>Barang</b></h4>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="ID">ID</label>
                    <input type="text" class="form-control" name="ID" value="<?php echo $LastID; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="NB">Nama Barang</label>
                    <input type="text" class="form-control" name="NB" required>
                </div>

                <div class="form-group">
                    <label for="SB">Stock Barang</label>
                    <input type="number" class="form-control" name="SB" required>
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
                    <input type="number" class="form-control" name="HB" required>
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
                    <input type="text" class="form-control" name="DES" required>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="button" value="Cancel" class="btn btn-primary" onClick="document.location.href='Tampilan_Manager.php';"/> <!--https://stackoverflow.com/questions/4553714/cancel-button-using-php-->
            </form>
            <br>
        </div>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if($_POST['HB'] != 0)
            {
                if($_POST['SB'] != 0)
                {
                    $BarangObject->setbarang($LastID, $_POST['NB'], $_POST['SB'], $_POST['HB'], $_POST['DES']);
                    header("Location: ../../View/Manager/Tampilan_Manager.php");
                }
                else
                {
                    setcookie('STOCK_ERROR', 'Stock Barang Tidak Boleh 0', time() + (86400 * 30), "/");

                    if($_POST['HB'] <= 0)
                    {
                        setcookie('HARGA_ERROR', 'Harga Barang Tidak Boleh 0', time() + (86400 * 30), "/");
                        header("Location: ../../View/Manager/Tampilan_Add_Manager.php");
                    }

                    header("Location: ../../View/Manager/Tampilan_Add_Manager.php");
                }
            }
            else
            {
                setcookie('HARGA_ERROR', 'Harga Barang Tidak Boleh 0', time() + (86400 * 30), "/");

                if($_POST['SB'] <= 0)
                {
                    setcookie('STOCK_ERROR', 'Stock Barang Tidak Boleh 0', time() + (86400 * 30), "/");
                    header("Location: ../../View/Manager/Tampilan_Add_Manager.php");
                }

                header("Location: ../../View/Manager/Tampilan_Add_Manager.php");
            }
        }
    ?>
</body>
</html>