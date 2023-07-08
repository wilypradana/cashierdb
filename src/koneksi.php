<?php 


$koneksi = mysqli_connect("localhost","root","","Cashier");

function waktu() {
   date_default_timezone_set('Asia/Jakarta');
   $jam = date('H');

   if ($jam >= 0 && $jam < 12) {
       return "pagi";
   } elseif ($jam >= 12 && $jam < 15) {
       return "siang";
   } elseif ($jam >= 15 && $jam < 18) {
       return "sore";
   } else {
       return "malam";
   }
}
// function JumlahTotal($JumlahTotal) {
//    global $koneksi;
//    $result = mysqli_query($koneksi, $JumlahTotal);
//    $rows = [];
//    while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//    }
//    return $rows;
// }

// function mines($mines) {
//    global $koneksi;
//    $result = mysqli_query($koneksi, $mines);
//    $rows = [];
//    while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//    }
//    return $rows;
// }
// function money($money) {
//    global $koneksi;
//    $result = mysqli_query($koneksi, $money);
//    $rows = [];
//    while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//    }
//    return $rows;
// }
// function moneyoncash($moneyoncash) {
//    global $koneksi;
//    $result = mysqli_query($koneksi, $moneyoncash);
//    $rows = [];
//    while ($row = mysqli_fetch_assoc($result)) {
//     $rows[] = $row;
//    }
//    return $rows;
// }



// query cashier


if (isset($_POST["update_cashier"])) {
   $cashid = $_POST["cashOnid"];
   $result_array = [];
   $query = "SELECT * FROM `MoneyOncash` WHERE id='$cashid'";
   $query_run = mysqli_query($koneksi, $query);
   if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) {
       array_push($result_array, $row);
     }
     header("content-type: application/json");
     echo json_encode($result_array);
   }
}




// query rugi
if (isset($_POST["update_rugi"])) {
   $cashid = $_POST["minesId"];
   $result_array = [];
   $query = "SELECT * FROM `mines` WHERE id='$cashid'";
   $query_run = mysqli_query($koneksi, $query);
   if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) {
       array_push($result_array, $row);
     }
     header("content-type: application/json");
     echo json_encode($result_array);
   }
}

// query catat
if (isset($_POST["update_catat"])) {
   $cashid = $_POST["catatId"];
   $result_array = [];
   $query = "SELECT * FROM `JumlahTotal` WHERE id='$cashid'";
   $query_run = mysqli_query($koneksi, $query);
   if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) {
       array_push($result_array, $row);
     }
     header("content-type: application/json");
     echo json_encode($result_array);
   }
}





// query money

if (isset($_POST["update_money"])) {
   $moneyId = $_POST["MoneyidId"];
   $result_array = [];
   $query = "SELECT * FROM `Money` WHERE id='$moneyId'";
   $query_run = mysqli_query($koneksi, $query);
   if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) {
       array_push($result_array, $row);
     }
     header("content-type: application/json");
     echo json_encode($result_array);
   }

}


if (isset($_POST["update_cashier"])) {
   $cashOnid = $_POST["money_id"];
   $input = $_POST["editCashOnModal"];
   $query = "UPDATE MoneyOncash SET nominal='$input' WHERE id='$cashOnid'";
   $query_run = mysqli_query($koneksi, $query);
}


   if (isset($_POST["update_catat"])) {

      $inputIdCatat = $_POST["catat_Id"];
      $inputCatat = $_POST["inputCatat"];
      $query = "UPDATE JumlahTotal SET  nominal='$inputCatat' WHERE id='$inputIdCatat'";
      $query_run = mysqli_query($koneksi, $query);
   }
 

 
   if (isset($_POST["update_rugi"])) {

      $inputIdCatat = $_POST["rugi_id"];
      $inputCatat = $_POST["insertRugi"];
      $query = "UPDATE mines SET  nominal='$inputCatat' WHERE id='$inputIdCatat'";
      $query_run = mysqli_query($koneksi, $query);
   }
 

   if (isset($_POST["update_money"])) {
      $inputIdCatat = $_POST["money_id"];
      $inputCatat = $_POST["inputMoney"];
      $query = "UPDATE Money SET  nominal='$inputCatat' WHERE id='$inputIdCatat'";
      $query_run = mysqli_query($koneksi, $query);
   }
 
   function register($data) {
      global $koneksi;
  
      $email = $data["email"];
      $username = strtolower(stripslashes($data["username"]));
      $password = mysqli_real_escape_string($koneksi, $data["password"]);
      $password2 = mysqli_real_escape_string($koneksi, $data["password2"]);
      $cekSamauser = mysqli_query($koneksi, "SELECT username FROM User WHERE username = '$username'");
  
      if (mysqli_num_rows($cekSamauser) > 0) {
          echo "
          <script>
          alert('Username sudah digunakan');
          </script>
          ";
          return false;
      }
  
      if ($password !== $password2) {
          echo "
          <script>
          alert('Password tidak sesuai');
          </script>
          ";
          return false;
      }
  
      // Enkripsi password
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
      $query = "INSERT INTO User (email, username, password) VALUES ('$email', '$username', '$hashedPassword')";
      $result = mysqli_query($koneksi, $query);
  
      if ($result) {
          // Menangkap nilai user_id yang baru ditambahkan
          $newUserId = mysqli_insert_id($koneksi);
  
          // Melakukan operasi penambahan entri baru di tabel-tabel lain dengan nilai nominal 0
          $queryMoneyOncash = "INSERT INTO MoneyOncash (user_id, nominal, task) VALUES ($newUserId, 0, 'Uang dikasir saat ini')";
          mysqli_query($koneksi, $queryMoneyOncash);
  
          $queryJumlahTotal = "INSERT INTO JumlahTotal (user_id, nominal) VALUES ($newUserId, 0)";
          mysqli_query($koneksi, $queryJumlahTotal);
  
          $queryMines = "INSERT INTO mines (user_id, nominal) VALUES ($newUserId, 0)";
          mysqli_query($koneksi, $queryMines);
  
          // Insert entri otomatis di tabel "Money" untuk setiap nominal uang
          $images = [
              "100ribu.jpg",
              "50ribu.jpeg",
              "20ribu.jpeg",
              "10ribu.jpeg",
              "5ribu.jpeg",
              "2ribu.jpeg",
              "seribu.jpeg",
              "500perak.jpeg",
              "200perak.jpeg",
              "100perak.jpeg"
          ];
  
          foreach ($images as $image) {
              $query = "INSERT INTO Money (user_id, image, nominal) VALUES ($newUserId, '$image', 0)";
              mysqli_query($koneksi, $query);
          }
  
          return mysqli_affected_rows($koneksi);
      } else {
          echo "Terjadi kesalahan saat mendaftarkan pengguna: " . mysqli_error($koneksi);
          return false;
      }
  }
  
  function moneyoncash($query, $user_id) {
   global $koneksi;
   $statement = mysqli_prepare($koneksi, $query);
   mysqli_stmt_bind_param($statement, 'i', $user_id);
   mysqli_stmt_execute($statement);
   $result = mysqli_stmt_get_result($statement);
   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
   mysqli_stmt_close($statement);
  return $data;

}
  function JumlahTotal($query, $user_id) {
   global $koneksi;
   $statement = mysqli_prepare($koneksi, $query);
   mysqli_stmt_bind_param($statement, 'i', $user_id);
   mysqli_stmt_execute($statement);
   $result = mysqli_stmt_get_result($statement);
   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
   mysqli_stmt_close($statement);
   return $data;
   // var_dump($data);

}
  function mines($query, $user_id) {
   global $koneksi;
   $statement = mysqli_prepare($koneksi, $query);
   mysqli_stmt_bind_param($statement, 'i', $user_id);
   mysqli_stmt_execute($statement);
   $result = mysqli_stmt_get_result($statement);
   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
   mysqli_stmt_close($statement);
   return $data;

}
  function money($query, $user_id) {
   global $koneksi;
   $statement = mysqli_prepare($koneksi, $query);
   mysqli_stmt_bind_param($statement, 'i', $user_id);
   mysqli_stmt_execute($statement);
   $result = mysqli_stmt_get_result($statement);
   $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
   mysqli_stmt_close($statement);
   return $data;

}



?>