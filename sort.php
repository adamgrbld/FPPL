<?php

//include 'dbcon.php';

interface Sorti {
  public function sorting();
}

class Ascending implements Sorti{
  public function sorting(){
    $db = new Database;
    return $db->result("SELECT * FROM user  ORDER BY nama ASC");
  
  }

}
class Descending implements Sorti{
  public function sorting(){
    $db = new Database;
    return $db->result("SELECT * FROM user ORDER BY nama DESC");
    
  }

}

class Zeni {
  private $sort;

  public function __construct(Sorti $sort)
  {
   $this->sort = $sort;
  }
  public function constructExec()
  {
   return $this->sort->sorting();
  }
}

?>