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
        include "../../Model/User.php";
        $UserObject = new User();
        
        foreach($UserObject->getLastID() as $Row)
        {
            $LastIDString = $Row['user_id'];
        }

        $LastID = $UserObject->getAutoIncrement($LastIDString);
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
                    <input type="text" class="form-control" name="ID" value="<?php echo $LastID; ?>" disabled>
                </div>

                <div class="form-group">
                    <label for="FN">First Name</label>
                    <input type="text" class="form-control" name="FN" required>
                </div>

                <div class="form-group">
                    <label for="LN">Last Name</label>
                    <input type="text" class="form-control" name="LN" required>
                </div>

                <div class="form-group">
                    <label for="sel1">Pilih Role:</label>
                    <select class="form-control" name="RL">
                        <option value="2">Manager</option>
                        <option value="3">Kasir</option>
                        <option value="4">Pembeli</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ADR">Address</label>
                    <input type="text" class="form-control" name="ADR" required>
                </div>

                <div class="form-group">
                    <label for="PW">Password</label>
                    <input type="password" class="form-control" name="PW" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="button" value="Cancel" class="btn btn-primary" onClick="document.location.href='Tampilan_Admin.php';"/>
            </form>
            <br>
        </div>
    </div>

    <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            $UserObject->setUser($LastID, $_POST['PW'], $_POST['FN'], $_POST['LN'], $_POST['RL'], $_POST['ADR']);
            header("Location: ../../View/Admin/Tampilan_Admin.php");
        }
    ?>
</body>
</html>