<?php 


require("koneksi.php");
$JumlahTotal = JumlahTotal("SELECT * FROM `JumlahTotal`");
$mines = mines("SELECT * FROM `mines`");
$moneyoncash = moneyoncash("SELECT * FROM `MoneyOncash`");
$moneys = money("SELECT * FROM `Money`");




?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      *{
        box-sizing: border-box;
      }

    </style>
  </head>
  <body>
    <h1 class="text-md font-bold text-center py-3">
      KalkoaTor made with ❤ by kalkoadev
    </h1>
    <p class="px-2"> Selamat <?= waktu() ?> </p>
    <div class="container px-4 text-center">
  <?php foreach($moneyoncash as $cash) :?>
  <div class="row gx-5">
    <span class="hidden" id="CashOnid"><?= $cash["id"] ?></span>
    <div class="col">
      <div class="p-3">Uang di kasir : Rp.&nbsp;<?= $cash["nominal"] ?> </div>
    </div>
    <div class="col mt-4">
      <button
        type="button"
        class="tampilCashOnModal btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl  dark:focus:ring-blue-800 "

        data-bs-toggle="modal"
        data-bs-target="#editCashOncashier"
        CashOnid="<?= $cash["id"] ?>"
      >
        Edit cepat
      </button>
    </div>
  </div>
  <?php endforeach; ?>
  <?php foreach($JumlahTotal as $Total) :?>
  <div class="row gx-5">
    <span class="hidden" id="Catataid"><?= $Total["id"] ?></span>
    <div class="col">
      <div class="p-3">Uang tercatat: &nbsp;<?= $Total["nominal"] ?></div>
    </div>
    <div class="col mt-4">
      <button
        type="button"
        class="showpopupcatat btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl  dark:focus:ring-blue-800"
        data-bs-toggle="modal"
        data-bs-target="#showpopupcatat"
        Catataid="<?= $Total["id"] ?>"
      >
        Edit cepat
      </button>
    </div>
  </div>
  <?php endforeach; ?>
  <?php foreach($mines as $rugi) :?>
  <div class="row gx-5">
    <span class="hidden" id="RugiOnid"><?= $rugi["id"] ?></span>
    <div class="col">
      <div class="p-3">Uang Mines : <?= $rugi["nominal"] ?></div>
    </div>
    <div class="col mt-4">
    <button
    type="button"
    class="buttonrugi btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl dark:focus:ring-blue-800"
    data-bs-toggle="modal"
    data-bs-target="#tampilrugiOnModal"
    RugiOnid="<?= $rugi["id"] ?>"
>
    Edit cepat
</button>
    </div>
  </div>
  <?php endforeach; ?>

    <div class=" text-center ">
    <h1 class="text-black font-extrabold text-3xl py-3">Uang di kasir saat ini</h1>
    <?php foreach($moneys as $money) :?>
  <div class="row align-items-center m-4 ">
    <div class="col-5">
     <img src="../assets/<?= $money["image"] ?>" alt="" srcset="" class="w-full">
    </div>
    <div class="col text-black font-bold text-2xl">
      <span>0</span>
    </div>
    <div class="col">
    <button
    type="button"
    class="buttonuang btn btn-primary  bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl dark:focus:ring-blue-800"
    data-bs-toggle="modal"
    data-bs-target="#tampilmoneyOnModal"
    moneyOnid="<?= $money["id"] ?>"
>
    Edit&nbsp;cepat
</button>
    </div>
  </div>
  <?php endforeach; ?>
</div>
</div>




<div class="fixed bottom-0 right-0 p-2">
  <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center">
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-10 h-10 text-yellow-400 ">
  <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm8.706-1.442c1.146-.573 2.437.463 2.126 1.706l-.709 2.836.042-.02a.75.75 0 01.67 1.34l-.04.022c-1.147.573-2.438-.463-2.127-1.706l.71-2.836-.042.02a.75.75 0 11-.671-1.34l.041-.022zM12 9a.75.75 0 100-1.5.75.75 0 000 1.5z" clip-rule="evenodd" />
</svg>
  </div>
</div>

  <!-- modal oncash-->
    <div
      class="modal fade"
      id="editCashOncashier"
      tabindex="-1"
      aria-labelledby="editCashOncashierLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editCashOncashierLabel">Edit cepat</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body font-bold text-black">
            <form action="" method="POST">
              <div class="mb-3">
                <label for="tampilCashOnModal" class="form-label"
                  >Edit cepat</label
                >
                <input  type="hidden" id="input_id" name="input_id"/>
                <input
                  type="text"
                  class="form-control"
                  id="editCashOnModal"
                  name="inputcashier"
                />
                <div id="emailHelp" class="form-text">
                  fokus dan tetap semangattt
                </div>
              </div>
              <button type="submit" class="btn btn-primary bg-red-600" name="update_cashier">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- modal -->
  <!-- modal catat -->
    <div
      class="modal fade"
      id="showpopupcatat"
      tabindex="-1"
      aria-labelledby="editCashOncatatLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editCashOncatatLabel">Edit cepat</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body font-bold text-black">
            <form action="koneksi.php" method="post">
              <div class="mb-3">
                <label for="tampilCashOncatat" class="form-label"
                  >Edit cepat</label
                >
                <input
                  type="number"
                  class="form-control"
                  id="editCashOncatat"
               
                />
                <div id="emailHelp" class="form-text">
                  fokus dan tetap semangattt
                </div>
              </div>
              <button type="submit" class="btn btn-primary bg-red-600" name="update_catat">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- modal -->
  <!-- modal mines-->
  <div
      class="modal fade"
      id="tampilrugiOnModal"
      tabindex="-1"
      aria-labelledby="editCashOncashierLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editCashOncashierLabel">Edit cepat</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body font-bold text-black">
            <form action="koneksi.php" method="POST">
              <div class="mb-3">
                <label for="tampilCashOnModal" class="form-label"
                  >Edit cepat</label
                >
                <input
                  type="number"
                  class="form-control"
                  id="editRugiOnModal"
                
                />
                <div id="emailHelp" class="form-text">
                  fokus dan tetap semangattt
                </div>
              </div>
              <button type="submit" class="btn btn-primary bg-red-600" name="update_rugi">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- modal -->
  <!-- modal mines-->
  <div
      class="modal fade"
      id="tampilmoneyOnModal"
      tabindex="-1"
      aria-labelledby="editCashOncashierLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="editCashOncashierLabel">Edit cepat</h1>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body font-bold text-black">
            <form action="koneksi.php" method="POST">
              <div class="mb-3">
                <label for="tampilCashOnModal" class="form-label"
                  >Edit cepat</label
                >
                <input
                  type="number"
                  class="form-control"
                  id="editMoneyOnModal"
                
                />
                <div id="emailHelp" class="form-text">
                  fokus dan tetap semangattt
                </div>
              </div>
              <button type="submit" class="btn btn-primary bg-red-600" name="update_rugi">
                Submit
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- modal -->


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
  
  </body>
</html>
