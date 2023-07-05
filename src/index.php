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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.css"  rel="stylesheet" />

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
            <button data-modal-target="CashOnCash" data-modal-toggle="CashOnCash"
              class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="button"
            >
               Edit cepat
              </button>
          </h3>
        </div>
        <?php endforeach; ?>
        <!-- akhir -->
        <!-- awal -->
        <?php foreach ( $jumlahTotal as $total) : ?>
        <div class="pt-9 grid grid-cols-2 gap-2">
          <h3 class="text-white font-semibold text-lg p-3">
            Jumlah&nbsp;yang&nbsp;Dimaksudkan&nbsp;:
            <div class="flex justify-center items-center md:hidden"></div>
            <span class="text-xl font-bold md:ml-3"
              ><?= $total["nominal"] ?>&nbsp;</span
            >
            <button
              class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="button"
            >
               Edit cepat
              </button>
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
              <button
              class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
              type="button"
            >
               Edit cepat
              </button>
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


    <!-- Main modal -->
<div id="CashOnCash" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="CashOnCash">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="px-6 py-6 lg:px-8">
                <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Fast Edit</h3>
                <form class="space-y-6" action="#">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nominal</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div> 
    <script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
  </body>
</html>
