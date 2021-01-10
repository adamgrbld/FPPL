<?php 
class Database {
  public $conn = null;

  public function __construct()
  {
   $this->conn = mysqli_connect("localhost","root","","software-house_tugas3");
  }

  public function query($sql)
    {
      return mysqli_query($this->conn,$sql);
    }
    public function result($sql){
        $result = $this->query($sql);
        $rows=[];
        while($row = mysqli_fetch_assoc($result)){
          if($_SESSION["role"] != 1){
            if($row["role"] == 1)
              continue;
              }
              $rows[]=$row;
            }

          return $rows;
      
    }
}

?>