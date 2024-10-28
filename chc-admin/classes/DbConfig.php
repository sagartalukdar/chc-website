<?php
  /**
   *
   */
  class DbConfig  {

      protected $servername='localhost';
      protected $username="root";
      protected $password="";

    public function connect() {
        try {

          	$connection = new PDO("mysql:host=$this->servername;dbname=chc",$this->username,$this->password);

          	$connection -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            // echo "Connected!";

            return $connection;

          } catch(PDOException $e) {

          	echo '<br>'.$e->getMessage();

          }
    }
  }
?>
