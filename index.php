<?php 
include 'dbcon.php';
require 'function.php';
include 'sort.php';

//$data= query("SELECT * FROM user");



if(isset($_GET['tipe'])&&$_GET['tipe'] == "ASC"){
  $iya = new Zeni(new Ascending);
  $data = $iya->constructExec();
}
else if(isset($_GET['tipe'])&&$_GET['tipe'] == "DESC"){
  $iya = new Zeni(new Descending);
  $data = $iya->constructExec();
}
else{
    $db = new Database;
    $data = $db->result("SELECT * FROM user");
}






if(isset($_POST['tmbl_cari'])){
  $data = cari($_POST['keyword']);
}
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>menampilkan database</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            </ul>
            <a href="login.php" class="btn btn-success mr-2 my-sm-0">Logout</a>
        </div>
    </nav>

    <div class="container">
        
        <form action="" method="post" class="mb-2 mt-2">
            <label for="keyword"><h6>Cari</h6></label>
            <input type="text" name="keyword" id="keyword" 
                placeholder="Masukan Nama" size="30" autofocus autocomplete="off">
            <button type="submit" class="btn btn-primary" name="tmbl_cari">Cari</button>
        </form>

        <form action="index.php" method="get" class="mb-2 mt-2">
            <button type="submit" class="btn btn-sucess" name="tipe" value="ASC">ASC</button>
        </form>
        <form action="index.php" method="get" class="mb-2 mt-2">
            <button type="submit" class="btn btn-danger" name="tipe" value="DESC">DESC</button>
        </form>
        
        <table class="table table-bordered table-sm">
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <?php if(isset($_SESSION['role'])){
                if($_SESSION['role'] == "1"){
                    echo 
                    "<th>Role</th>
                    <th>Action</th>";
                }}

                ?>
            </tr>
            </thead>
            <tbody>
                <?php
                    $nomor = 1 ;
                    //  var_dump($data);
                    //  die;
                    foreach($data as $row) :?>
                    <tr>
                        <td><?= $nomor++;?>.</td>
                        <td><h6><?= $row['nama'] ?></h6></td>
                        <?php if($_SESSION['role'] == "1"): ?>
                            <td><h6><?php if($row['role'] == 1){ echo "Admin"; }else if($row['role'] == 2){echo "User";} ?></h6></td>
                            <td>
                                <a href="ubah.php?id=<?= $row['id'];?>" class="btn btn-info" role="button">Ubah</a>
                                <a href="hapus.php?id=<?= $row['id'];?>" class="btn btn-danger" 
                                role="button" onclick="return confirm('data ingin di hapus?');">Hapus</a>
                            </td>
                        <?php endif ?>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

  </body>
  
  </html>