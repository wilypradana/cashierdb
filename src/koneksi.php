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
function JumlahTotal($JumlahTotal) {
   global $koneksi;
   $result = mysqli_query($koneksi, $JumlahTotal);
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
   }
   return $rows;
}

function mines($mines) {
   global $koneksi;
   $result = mysqli_query($koneksi, $mines);
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
   }
   return $rows;
}
function money($money) {
   global $koneksi;
   $result = mysqli_query($koneksi, $money);
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
   }
   return $rows;
}
function moneyoncash($moneyoncash) {
   global $koneksi;
   $result = mysqli_query($koneksi, $moneyoncash);
   $rows = [];
   while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
   }
   return $rows;
}



if (isset($_POST["update_cashier"])) {
   $CashId = $_POST["cashId"];
   $result_array = [];
   $query = "SELECT * FROM `MoneyOncash` WHERE id='$CashId'";
   $query_run = mysqli_query($koneksi, $query);

   if (mysqli_num_rows($query_run) > 0) {
      foreach ( $query_run as $row) {
         array_push($result_array, $row);
         header("content-type: application/json");
         echo json_encode($result_array);

      }
   }
}

if (isset($_POST["update_catat"])) {
   $catatid = $_POST["catatId"];
   $result_array = [];
   $query = "SELECT * FROM `JumlahTotal` WHERE id='$catatid'";
   $query_run = mysqli_query($koneksi, $query);
   if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) {
       array_push($result_array, $row);
     }
     header("content-type: application/json");
     echo json_encode($result_array);
   }

}




if (isset($_POST["update_rugi"])) {
   $rugiid = $_POST["minesId"];
   $result_array = [];
   $query = "SELECT * FROM `mines` WHERE id='$rugiid'";
   $query_run = mysqli_query($koneksi, $query);
   if (mysqli_num_rows($query_run) > 0) {
     foreach ($query_run as $row) {
       array_push($result_array, $row);
     }
     header("content-type: application/json");
     echo json_encode($result_array);
   }
}


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
   $inputId = $_POST["input_id"];
   $input = $_POST["inputcashier"];
   $query = "UPDATE MoneyOncash SET nominal='$input' WHERE id='$inputId'";
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
 
   if (isset($_POST["update_rugi"])) {

      $inputIdCatat = $_POST["rugi_id"];
      $inputCatat = $_POST["insertRugi"];
      $query = "UPDATE mines SET  nominal='$inputCatat' WHERE id='$inputIdCatat'";
      $query_run = mysqli_query($koneksi, $query);
   }
 
   if (isset($_POST["update_rugi"])) {

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
  
      if ($password !== $password2) {
          echo "
          <script>
          alert('password tidak sesuai')
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
          $queryMoneyOncash = "INSERT INTO MoneyOncash (user_id, nominal) VALUES ($newUserId, 0)";
          mysqli_query($koneksi, $queryMoneyOncash);
  
          $queryJumlahTotal = "INSERT INTO JumlahTotal (user_id, nominal) VALUES ($newUserId, 0)";
          mysqli_query($koneksi, $queryJumlahTotal);
  
          $queryMines = "INSERT INTO mines (user_id, nominal) VALUES ($newUserId, 0)";
          mysqli_query($koneksi, $queryMines);
  
           // Insert entri otomatis di tabel "Money" untuk setiap nominal uang
           $images = [
            "100rb.jpg",
            "50rb.jpg",
            "20rb.jpg",
            "10rb.jpg",
            "5rb.jpg",
            "2rb.jpg",
            "1rb.jpg",
            "500perak.jpg",
            "200perak.jpg",
            "100perak.jpg"
        ];
        

    foreach ($images as $image) {
        $query = "INSERT INTO Money (user_id, image,) VALUES ($newUserId, '$images')";
        mysqli_query($koneksi, $query);
    }
          return mysqli_affected_rows($koneksi);
      } else {
          echo "Terjadi kesalahan saat mendaftarkan pengguna: " . mysqli_error($koneksi);
          return false;
      }
  }
  


?>