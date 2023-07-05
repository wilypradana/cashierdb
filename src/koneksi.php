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
   }else{
      echo "
      <script>
      alert('gaggal')
      </script>
      ";
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
   }else{
      echo "
      <script>
      alert('gaggal')
      </script>
      ";
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
   }else{
      echo "
      <script>
      alert('gaggal')
      </script>
      ";
   }

}


 
?>
