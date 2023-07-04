<?php 
$koneksi = mysqli_connect("localhost","root","","Cashier");


function queryJumlahTotal($queryJumlahTotal) {
   global $koneksi;
   $result = mysqli_query($koneksi, $queryJumlahTotal);
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



?>
