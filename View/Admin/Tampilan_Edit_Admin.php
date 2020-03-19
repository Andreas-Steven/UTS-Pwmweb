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
        include "../../Model/User.php";

        $id = $_GET['id'];
        
        $UserObject = new User();

        foreach($UserObject->getUserByID($id) as $Row)
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
                    <input type="text" class="form-control" placeholder="<?php echo $Row['user_id']; ?>" disabled>
                    <input type="hidden" class="form-control" name="ID" value="<?php echo $Row['user_id']; ?>">
                </div>

                <div class="form-group">
                    <label for="FN">First Name</label>
                    <input type="text" class="form-control" name="FN"  value="<?php echo $Row['first_name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="LN">Last Name</label>
                    <input type="text" class="form-control" name="LN" value="<?php echo $Row['last_name']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="RL">Role</label>
                    <select class="form-control" name="RL">
                        <?php
                            if($Row['role_id'] === '1')
                            {
                                echo "<option value='1' selected>Admin</option>";
                                echo "<option value='2'>Manager</option>";
                                echo "<option value='3'>kasir</option>";
                                echo "<option value='4'>Pembeli</option>";
                            }
                            else if($Row['role_id'] === '2')
                            {
                                echo "<option value='2' selected>Manager</option>";
                                echo "<option value='3'>kasir</option>";
                                echo "<option value='4'>Pembeli</option>";
                            }
                            else if($Row['role_id'] === '3')
                            {
                                echo "<option value='2'>Manager</option>";
                                echo "<option value='3' selected>kasir</option>";
                                echo "<option value='4'>Pembeli</option>";
                            }
                            else if($Row['role_id'] === '4')
                            {
                                echo "<option value='2'>Manager</option>";
                                echo "<option value='3'>kasir</option>";
                                echo "<option value='4' selected>Pembeli</option>";
                            }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="ADR">Address</label>
                    <input type="text" class="form-control" name="ADR" value="<?php echo $Row['address']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="PW">Password</label>
                    <input type="password" class="form-control" name="PW" value="<?php echo $Row['password']; ?>" required>
                    <input type="hidden" class="form-control" name="PW2" value="<?php echo $Row['password']; ?>">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <input type="button" value="Cancel" class="btn btn-primary" onClick="document.location.href='../../View/Admin/Tampilan_Admin.php';"/> <!--https://stackoverflow.com/questions/4553714/cancel-button-using-php-->
            </form>
            <br>
        </div>
        </div>
    <?php
        }
        
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            if($_POST['PW'] != $_POST['PW2'])
            {
                $Password_MD5 = md5($_POST['PW']);
                $UserObject->UpdateUser($_POST['ID'], $Password_MD5, $_POST['FN'], $_POST['LN'], $_POST['RL'], $_POST['ADR']);
                header("Location: ../../View/Admin/Tampilan_Admin.php");
            }
            else if($_POST['PW'] === $_POST['PW2'])
            {
                $UserObject->UpdateUser($_POST['ID'], $_POST['PW'], $_POST['FN'], $_POST['LN'], $_POST['RL'], $_POST['ADR']);
                header("Location: ../../View/Admin/Tampilan_Admin.php");
            }
        }
    ?>
</body>
</html>