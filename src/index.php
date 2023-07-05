<?php 
require("koneksi.php");
$JumlahTotal = JumlahTotal("SELECT * FROM `JumlahTotal`");
$mines = mines("SELECT * FROM `mines`");
$moneyoncash = moneyoncash("SELECT * FROM `MoneyOncash`");




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
  </head>
  <body>
    <h1 class="text-xl font-bold text-center py-3">
      KalkoaTor made ❤ by kalkoadev
    </h1>
    <div class="container px-4 text-center">
  <?php foreach($moneyoncash as $cash) :?>
  <div class="row gx-5">
    <span class="hidden" id="CashOnid"><?= $cash["id"] ?></span>
    <div class="col">
      <div class="p-3">Uang di kasir : <?= $cash["nominal"] ?></div>
    </div>
    <div class="col mt-4">
      <button
        type="button"
        class="tampilCashOnModal btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 "

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
    <span class="hidden" id="CatatOnid"><?= $Total["id"] ?></span>
    <div class="col">
      <div class="p-3">Uang tercatat: &nbsp;<?= $Total["nominal"] ?></div>
    </div>
    <div class="col mt-4">
      <button
        type="button"
        class="showpopupcatat btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800"
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
    <span class="hidden" id="minesOnid"><?= $rugi["id"] ?></span>
    <div class="col">
      <div class="p-3">Uang Mines : <?= $rugi["nominal"] ?></div>
    </div>
    <div class="col mt-4">
      <button
        type="button"
        class="tampilCatatOnModal btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 "

        data-bs-toggle="modal"
        data-bs-target="#editCatatOnmines"
        CashOnid="<?= $rugi["id"] ?>"
      >
        Edit cepat
      </button>
    </div>
  </div>
  <?php endforeach; ?>
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
            <form action="koneksi.php" method="POST">
              <div class="mb-3">
                <label for="tampilCashOnModal" class="form-label"
                  >Edit cepat</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="editCashOnModal"
                
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
            <form action="koneksi.php" method="POST">
              <div class="mb-3">
                <label for="tampilCashOncatat" class="form-label"
                  >Edit cepat</label
                >
                <input
                  type="text"
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
            <form action="koneksi.php" method="POST">
              <div class="mb-3">
                <label for="tampilCashOnModal" class="form-label"
                  >Edit cepat</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="editCashOnModal"
                
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
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
      crossorigin="anonymous"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
  
  </body>
</html>
