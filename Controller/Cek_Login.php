<?php
    include "../Model/User.php";

    $UserObject = new User();

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $Result = $UserObject->getLogin($_POST['username'], $_POST['pass']);
        
        if($Result === TRUE)
        {   
            setcookie('STATUS', 'Success', time() + (86400 * 30), "/");

            $Result = $UserObject->getRole($_POST['username']);

            if($Result === 1)
            {
                setcookie('ROLE', 'Admin', time() + (86400 * 30), "/");
                header("Location: ../View/Admin/Tampilan_Admin.php");
            }
            else if($Result === 2)
            {
                setcookie('ROLE', 'Manager', time() + (86400 * 30), "/");
                header("Location: ../View/Manager/Tampilan_Manager.php");
            }
            else if($Result === 3)
            {
                setcookie('ROLE', 'Kasir', time() + (86400 * 30), "/");
                header("Location: ../View/Kasir/Tampilan_Kasir.php");
            }
            else if($Result === 4)
            {
                setcookie('ROLE', 'Pembeli', time() + (86400 * 30), "/");
                header("Location: ../View/Pembeli/Tampilan_Pembeli.php");
            }
            else
            {
                header("Location: ../View/Tampilan_Login.php");
            }
        }
        else if($Result === FALSE)
        {
            setcookie('STATUS', 'ID tidak terdaftar atau password salah, silahkan coba lagi', time() + (86400 * 30), "/");
            header("Location: ../View/Tampilan_Login.php");
        }

    }
?>