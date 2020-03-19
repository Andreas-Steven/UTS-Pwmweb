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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css">
    
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../Additonal/css/ViewCSS.css">
    <script type="text/javascript">
	$(document).ready(function()
    {
		// Activate tooltip
		$('[data-toggle="tooltip"]').tooltip();
		
		// Select/Deselect checkboxes
		var checkbox = $('table tbody input[type="checkbox"]');
		$("#selectAll").click(function()
        {
			if(this.checked)
            {
				checkbox.each(function()
                {
					this.checked = true;                        
				});
			} 
            else
            {
				checkbox.each(function()
                {
					this.checked = false;                        
				});
			} 
		});
		checkbox.click(function()
        {
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
        $BarangObject = new barang();
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
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#LogoutModal" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav> 
	<!--Main Navigation-->

    <div class="container">
        <div class="col-sm-6" style="float:none;margin:auto;">
            <h2 class="text-center">Daftar <b>Barang</b></h2>
        </div>

        <br><br>

        <!--Card View-->
        <!-- MODEL AWAL
        <div class="col-md-4 col-sm-6">
            <div class="card text-center" style="height: 20rem;">
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title pricing-card-title">DORITOS</h2>
                    <ul class="list-unstyled mt-3 mb-4">
                        <li style="color:white;">10 users included</li>
                        <li style="font-size: 16px;">Rp 8.000,00</li>
                        <li style="font-size: 18px;">Sedikit</li>
                        <li style="color:white;">Help center access</li>
                    </ul>
                    <a href="" class='btn btn-info'>View More</a>
                </div>
            </div>
	    </div>
        -->
        <?php
            foreach($BarangObject->getBarangData() as $Row)
            {
        ?>
                <div class="col-md-4 col-sm-6">
                    <div class="card text-center" style="height: 20rem;">
                        <div class="card-body d-flex flex-column">
                            <h2 class="card-title pricing-card-title"><?php echo $Row['item_name']; ?></h2>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li style="color:white;">10 users included</li>
                                <li style="font-size: 16px;"><?php echo $Harga = $BarangObject->Rupiah($Row['item_price']); ?></li>
                                <li style="font-size: 18px;"><?php echo $Stock =$BarangObject->getBanyakStock($Row['item_stock']); ?></li>
                                <li style="color:white;">Help center access</li>
                            </ul>
                            <?php echo "<a href=\"Tampilan_View_Pembeli.php?id=".$Row['item_id']."\" class='btn btn-info'>View More</a>" ?>
                        </div>
                    </div>
                </div>
        <?php
            }
        ?>
    </div>

	<!-- Logout Modal HTML -->
	<div id="LogoutModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="../../Controller/Logout.php" method="POST">
					<div class="modal-header">						
						<h4 class="modal-title">Logout</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to logout?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Logout">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>