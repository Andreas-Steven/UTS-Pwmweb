<?php
    class User
    {
        private $Host = "localhost";
        private $Username = "root";
        private $Password = "";
        private $DBname = "ushop";

        function __construct()
        {
            mysqli_connect($this->Host, $this->Username, $this->Password, $this->DBname);
        }

        function getUserData()
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $Result = mysqli_query($Connect, "SELECT * FROM user");

            while($DATA = $Result->fetch_assoc())
            {
                $Hasil[] = $DATA;
            }
            
            return $Hasil;
        }

        function setUser($ID, $Password, $FirstName, $LastName, $RoleID, $Address)
        {
            $Password_MD5 = md5($Password);

            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $stmt = $Connect->prepare("INSERT INTO user(`user_id`, `password`, `first_name`, `last_name`, `role_id`, `address`) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('ssssss', $ID, $Password_MD5, $FirstName, $LastName, $RoleID, $Address);
            $stmt->execute();
        }

        function getLogin($ID, $Password)
        {
            $Password_MD5 = md5($Password);

            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $stmt = $Connect->prepare("SELECT * FROM `user` WHERE `user_id`=? AND `password`=?");
            $stmt->bind_param('ss', $ID, $Password_MD5);
            $stmt->execute();
            $stmt->store_result();
            $num_rows = $stmt->num_rows;
            $stmt->close();

            return $num_rows == 1 ? TRUE : FALSE;
        }

        function getRole($ID)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $stmt = $Connect->prepare("SELECT * FROM `user` WHERE `user_id`=?");
            $stmt->bind_param('s', $ID);
            $stmt->execute();

            $result = $stmt->get_result();
            $row    = $result->fetch_assoc();

            if ($row) 
            {
                return $row['role_id'];
            }
        }

        function getLastID()
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $Result = mysqli_query($Connect, "SELECT `user_id` FROM user ORDER BY `user_id` DESC LIMIT 1");

            while($DATA = $Result->fetch_assoc())
            {
                $Hasil[] = $DATA;
            }
            
            return $Hasil;
        }

        function getAutoIncrement($LastID)
        {
            $LastID_INT = (int)$LastID;

            return (string)$LastID_INT + 1;
        }
           
        function DeleteUser($ID)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $stmt = $Connect->prepare("DELETE FROM user WHERE `user_id`=?");
            $stmt->bind_param('s', $ID);
            $stmt->execute();
            $stmt->close();
        }

        function UpdateUser($ID, $Password, $FirstName, $LastName, $RoleID, $Address)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            if($stmt = $Connect->prepare("UPDATE `user` SET `first_name`=?, `last_name`=?, `role_id`=?, `password`=? WHERE `user_id`=?"))
            {
                $stmt->bind_param('sssss', $FirstName, $LastName, $RoleID, $Password, $ID);
                $stmt->execute();
                $stmt->close();
            }
            else
            {
                var_dump($Connect->error);
            }
        }

        function getUserByID($ID)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $Result = mysqli_query($Connect, "SELECT * FROM user WHERE `user_id`='$ID'");

            while($DATA = $Result->fetch_assoc())
            {
                $Hasil[] = $DATA;
            }
            
            return $Hasil;
        }
    }
?>