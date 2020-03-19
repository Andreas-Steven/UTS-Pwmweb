<?php
    class Barang
    {
        private $Host = "localhost";
        private $Username = "root";
        private $Password = "";
        private $DBname = "ushop";

        function __construct()
        {
            mysqli_connect($this->Host, $this->Username, $this->Password, $this->DBname);
        }

        function getBarangData()
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $Result = mysqli_query($Connect, "SELECT * FROM item");

            while($DATA = $Result->fetch_assoc())
            {
                $Hasil[] = $DATA;
            }
            
            return $Hasil;
        }

        function setBarang($ID, $ItemName, $ItemStock, $ItemPrice, $ItemDesc)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $stmt = $Connect->prepare("INSERT INTO item(`item_id`, `item_name`, `item_stock`, `item_price`, `item_desc`) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('ssdds', $ID, $ItemName, $ItemStock, $ItemPrice, $ItemDesc);
            $stmt->execute();
        }

        function getLastID()
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $Result = mysqli_query($Connect, "SELECT `item_id` FROM item ORDER BY `item_id` DESC LIMIT 1");

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
           
        function DeleteItem($ID)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $stmt = $Connect->prepare("DELETE FROM item WHERE `item_id`=?");
            $stmt->bind_param('s', $ID);
            $stmt->execute();
            $stmt->close();
        }

        function UpdateItem($ID, $ItemName, $ItemStock, $ItemPrice, $ItemDesc)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            if($stmt = $Connect->prepare("UPDATE `item` SET `item_name`=?, `item_stock`=?, `item_price`=?, `item_desc`=? WHERE `item_id`=?"))
            {
                $stmt->bind_param('sddss', $ItemName, $ItemStock, $ItemPrice, $ItemDesc, $ID);
                $stmt->execute();
                $stmt->close();
            }
            else
            {
                var_dump($Connect->error);
            }
        }

        function getItemByID($ID)
        {
            $Connect = new mysqli($this->Host, $this->Username, $this->Password, $this->DBname);
            $Result = mysqli_query($Connect, "SELECT * FROM item WHERE `item_id`='$ID'");

            while($DATA = $Result->fetch_assoc())
            {
                $Hasil[] = $DATA;
            }
            
            return $Hasil;
        }

        function Rupiah($ItemPrice)
        {
            $hasil_rupiah = "Rp " . number_format($ItemPrice,2,',','.');

            return $hasil_rupiah;
        }

        function getBanyakStock($ItemStock)
        {
            $Hasil = NULL;

            if($ItemStock > 15)
            {
                $Hasil = "Tersedia";
            }
            else if($ItemStock >= 5 && $ItemStock <= 15)
            {
                $Hasil = "Terbatas";
            }
            else if($ItemStock >= 1 && $ItemStock <= 4)
            {
                $Hasil = "Hampir Habis";
            }
            else if($ItemStock == 0 || $ItemStock < 0)
            {
                $Hasil = "Habis";
            }

            return $Hasil;
        }
    }
?>