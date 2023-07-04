<?php
require "koneksi.php";
$jumlahTotal  = queryJumlahTotal("SELECT * FROM `JumlahTotal`");
$moneys  = queryJumlahTotal("SELECT * FROM `Money`");
$mines  = queryJumlahTotal("SELECT * FROM `mines`");
$moneyOncash  = queryJumlahTotal("SELECT * FROM `MoneyOncash`");



?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="../dist/output.css" />
  </head>
  <body>
    <!-- ====== Call To Action Section Start -->

    <section class="bg-black">
      <div class="container">
        <div>
          <p class="text-zinc-100 text-center pt-2 font-semibold">
            Made ❤ By <a href="#" class="text-orange-500">kalkoaDev</a>
          </p>
          <h1 class="px-2 font-bold text-white mt-4">Selamat Malam</h1>
        </div>
        <!-- awal -->
        <?php foreach ( $moneyOncash as $cash) : ?>
        <div class="container pt-14">
          <h3 class="text-white font-semibold text-lg p-3">
            Uang di kasir saat ini :
            <span class="text-xl font-bold"> <?= $cash["nominal"] ?> </span>
            <a
              href=""
              class="text-blue-400 ml-3 underline font-medium text-sm float-right"
              >Edit Cepat</a
            >
          </h3>
        </div>
        <?php endforeach; ?>
        <!-- akhir -->
        <!-- awal -->
        <?php foreach ( $jumlahTotal as $total) : ?>
        <div class="pt-9">
          <h3 class="text-white font-semibold text-lg p-3">
            Jumlah&nbsp;yang&nbsp;Dimaksudkan&nbsp;:
            <div class="flex justify-center items-center md:hidden"></div>
            <span class="text-xl font-bold md:ml-3"
              ><?= $total["nominal"] ?>&nbsp;</span
            >
            <a
              href=""
              class="text-blue-400 ml-3 underline font-medium text-sm float-right"
              >Edit Cepat</a
            >
          </h3>
        </div>
        <?php endforeach; ?>
        <!-- akhir -->
        <!-- awal -->
        <?php foreach ( $mines as $rugi) : ?>
        <div class="container pt-9">
          <h3 class="text-white font-semibold text-lg p-3">
            Mines :
            <span class="text-xl font-bold"><?= $rugi["nominal"] ?></span>
            <a
              href=""
              class="text-blue-400 ml-3 underline font-medium text-sm float-right"
              >Edit Cepat</a
            >
          </h3>
        </div>
        <?php endforeach; ?>
        <!-- akhir -->
      </div>
    </section>
    <!-- ====== Call To Action Section End -->

    <section class="px-2 mb-4">
      <h1 class="text-center font-bold text-2xl text-black py-9">
        Jumlah Uang Yang ada dikasir
      </h1>
      <div class="flex flex-col">
        <!-- pecahan uang -->
        <?php foreach ( $moneys as $money) : ?>
        <div class="py-3 grid grid-cols-2 gap-2 items-center mb-4 editUang">
          <img class="h-auto w-64" src="../assets/<?= $money["image"] ?>
          " alt="image description" />

          <div class="flex justify-center items-center">
            <span class="font-bold px-4 text-4xl">
              <?= $money["nominal"] ?>
            </span>
            <button
              data-modal-target="defaultModal"
              data-modal-toggle="defaultModal"
              class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="button"
            >
              Edit cepat
            </button>
          </div>
        </div>
        <?php endforeach; ?>
        <!-- pecahan uang 100.000 -->
      </div>
    </section>

    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
  </body>
</html>
