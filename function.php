<?php 

//include 'dbcon.php';
// koneksi ke mysql

session_start();



// mengambil satu-satu query di masukan ke array
// function query($query){
//   global $conn;
//   $result = mysqli_query($conn,$query);
//   $rows=[];
//   while($row = mysqli_fetch_assoc($result)){
//     if($_SESSION["role"] != 1){
//       if($row["role"] == 1)
//         continue;
//     }
//     $rows[]=$row;
//   }

//  return $rows;
//}

// fungsi tambah data
function register($data){
  $db = new Database;
 // global $conn;

  $nama = $data["email"];
  $password = $data["pswd"];
  $role = $data["role"];
  $password = password_hash($password, PASSWORD_DEFAULT);

 // $query = "INSERT INTO user value (null, '$nama', '$password', '$role')";
 // mysqli_query($conn,$query);
 $db->query("INSERT INTO user VALUES(null, '$nama', '$password', '$role')");
  
  return mysqli_affected_rows($db->conn);
}

// fungsi hapus data
function hapus($id){
  $db = new Database;
//    global $conn;
//    mysqli_query($conn,"DELETE FROM user WHERE id = $id");
    $db->query("DELETE FROM user where id=$id");
    return mysqli_affected_rows($db->conn);
}

// fungsi ubah data
function ubah($data){
  $db = new Database;
  //global $conn;
  $id=$data['id'];
  $nama=htmlspecialchars($data["email"]);
  $role=$data["role"];

  if($data["password"]){
    $password = htmlspecialchars($data["password"]);
    $password = password_hash($password, PASSWORD_DEFAULT);
  }
  else{
    $password = htmlspecialchars($data["passwordOld"]);
  }

  // $query="UPDATE user SET 
  //     nama = '$nama',
  //     password ='$password',
  //     role='$role'
  //     WHERE id=$id
  //     ";
  
 // mysqli_query($conn,$query);
  $db->query("UPDATE user SET 
            nama = '$nama',
            password ='$password',
            role='$role'
            WHERE id=$id");
  return mysqli_affected_rows($db->conn);
}

// fungsi cari
function cari($keyword){
  
 // $query = "SELECT * FROM user WHERE nama LIKE '%$keyword%'";
  $db = new Database;
  return $db->result("SELECT * FROM user WHERE nama LIKE '%$keyword%'");
}

function login($data){
  $db = new Database;
  $nama = htmlspecialchars($data["email"]);
  $password = htmlspecialchars($data["pswd"]);

  //$query = "SELECT * FROM user WHERE nama ='$nama'";
  $_SESSION['role'] = 1;
  $data = $db->result("SELECT * FROM user WHERE nama ='$nama'");

  return password_verify($password , $data[0]["password"]);

}

function rolecek($data){

 // $query = "SELECT * FROM user WHERE nama ='$data'";
  $db = new Database;
  $data =  $db->result("SELECT * FROM user WHERE nama ='$data'");
  
  return $data[0]["role"];
}