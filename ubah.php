<?php 
include 'function.php';
 
$id=$_GET["id"];

$data = query("SELECT * FROM user WHERE id = $id")[0];

if(isset($_POST['submit'])){
    
  if(ubah($_POST)>0){
    echo ' <script>
    alert("data berhasil di ubah");
    document.location.href="index.php";
    </script>';
  }
  else{
    echo ' <script>
    alert("data gagal di ubah");
    document.location.href="index.php";
    </script>';
  }
}
// isi nama host, username mysql, dan password mysql anda


?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  <title>Update</title>
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

    <div class="row mb-5 mt-2">
      <div class="col-lg-4">
      <a href="index.php" class="btn btn-primary tengah2" 
        role="button">Kembali</a></div>
      <div class="col-lg-4"><h2>Update Menu</h2></div>     
      <div class="col-lg-4"></div>
    </div>
    
    <div class="row">
      <div class="col-lg-12">

        <form method="post">
        <input type="hidden" name="id" value="<?= $data['id'];?>">
        <input type="hidden" name="passwordOld" value="<?= $data['password'];?>">

        <div class="form-group row">
          <label for="email" class="col-2">Email:</label>
          <input class="col-5" type="email" id="email" name="email" required 
          value="<?= $data['nama'];?>">
        </div>

        <div class="form-group row">
          <label for="password" class="col-2">Password:</label>
          <input class="col-5" type="password" id="password"  name="password">
        </div>

        <div class="form-group row">
        <label class="col-2">Role:</label>
          <select name="role" class="custom-select col-5">
            <option <?php if($data['role'] == 1){ echo 'selected'; } ?> value="1">Admin</option>
            <option <?php if($data['role'] == 2){ echo 'selected'; } ?> value="2">User</option>
          </select>
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>

    </div>
  </div>
</div>
</body>

</html>