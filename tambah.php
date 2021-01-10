<?php 
include 'function.php';

if(isset($_POST['submit'])){
    
  if(tambah($_POST)>0){
    echo ' <script>
    alert("data berhasil di tambahkan");
    document.location.href="tampildata.php";
    </script>';
  }
  else{
    echo ' <script>
    alert("data gagal di tambahkan");
    document.location.href="tampildata.php";
    </script>';
  }
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
    <title>tambah data</title>
</head>

<body>
  <div class="container">

    <div class="row stroke">
      <div class="col-lg-4 stroke">
      <a href="tampildata.php" class="btn btn-primary tengah2" 
        role="button">Kembali</a></div>
      <div class="col-lg-4 stroke"><h2>Tambah Menu</h2></div>     
      <div class="col-lg-4 stroke"></div>
    </div>
     
    <div class="row stroke tengah" style="margin-top:20px">
      <div class="col-lg-12 stroke">

        <form method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="nama">Nama:</label>
          <input type="nama" id="nama" name="nama" required autocomplete="off">
        </div>
        <div class="form-group">
          <label for="harga">Harga:</label>
          <input type="harga" id="harga"  name="harga" required autocomplete="off">
        </div>
        <div class="form-group">
          <input type="file" class=" border" name="file" id="file">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>
    </div>
  </div>
  <div class="row stroke">
    <div class="col-lg-12 stroke">footer</div>
  </div>
</div>
</body>

</html>