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

    <link rel="stylesheet" href="../Additonal/About/css/animate.css">
    <link rel="stylesheet" href="../Additonal/About/css/style.css">
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  <!--Main Navigation-->
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
                <?php
                    if(isset($_COOKIE['ROLE']))
                    {
                        if($_COOKIE['ROLE'] === "Admin")
                        {
                            echo "<a class='navbar-brand' href='Admin/Tampilan_Admin.php'>UShop</a>";
                        }
                        else if($_COOKIE['ROLE'] === "Manager")
                        {   
                            echo "<a class='navbar-brand' href='Manager/Tampilan_Manager.php'>UShop</a>";
                        }
                        else if($_COOKIE['ROLE'] === "Kasir")
                        {
                            echo "<a class='navbar-brand' href='Kasir/Tampilan_Kasir.php'>UShop</a>";
                        }
                        else if($_COOKIE['ROLE'] === "Pembeli")
                        {
                            echo "<a class='navbar-brand' href='Pembeli/Tampilan_Pembeli.php'>UShop</a>";
                        }
                    }
                ?>      			
        </div>
        <ul class="nav navbar-nav">
        <li class="active"><a href="#">About</a></li>
        </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#LogoutModal" data-toggle="modal"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
      </ul>
    </div>
  </nav> 
  <!--Main Navigation-->

  <section class="ftco-about img ftco-section ftco-no-pt ftco-no-pb" id="about-section">
    <div class="container">
      <div class="row d-flex no-gutters">
        <div class="col-md-6 col-lg-6 d-flex">
          <div class="img-about img d-flex align-items-stretch">
            <div class="overlay"></div>
            <div class="img d-flex align-self-stretch align-items-center" style="background-image:url(../Additonal/About/images/about.jpg);">
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 pl-md-5 py-5">
          <div class="row justify-content-start pb-3">
            <div class="col-md-12 heading-section ftco-animate">
              <h2 class="mb-4">About Me</h2>
              <ul class="about-info mt-4 px-md-0 px-2">
                <li class="d-flex"><span>Name:</span> <span>Andreas Steven</span></li>
                <li class="d-flex"><span>NIM:</span> <span>00000020150</span></li>
                <li class="d-flex"><span>Angkatan:</span> <span>2017</span></li>
                <li class="d-flex"><span>Email:</span> <span>andreas.steven@student.umn.ac.id</span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  

  <!-- Logout Modal HTML -->
	<div id="LogoutModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="../Controller/Logout.php" method="POST">
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
  
  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <script src="../Additonal/About/js/jquery.min.js"></script>
  <script src="../Additonal/About/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="../Additonal/About/js/popper.min.js"></script>
  <script src="../Additonal/About/js/bootstrap.min.js"></script>
  <script src="../Additonal/About/js/jquery.easing.1.3.js"></script>
  <script src="../Additonal/About/js/jquery.waypoints.min.js"></script>
  <script src="../Additonal/About/js/jquery.stellar.min.js"></script>
  <script src="../Additonal/About/js/owl.carousel.min.js"></script>
  <script src="../Additonal/About/js/jquery.magnific-popup.min.js"></script>
  <script src="../Additonal/About/js/aos.js"></script>
  <script src="../Additonal/About/js/jquery.animateNumber.min.js"></script>
  <script src="../Additonal/About/js/scrollax.min.js"></script>
  
  <script src="../Additonal/About/js/main.js"></script>
</body>
</html>