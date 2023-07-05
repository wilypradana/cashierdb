<?php 
$koneksi = mysqli_connect("localhost","root","","Cashier");


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


 
?>
