<?php 


require("koneksi.php");

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION["user_id"])) {
    header("Location: gettingstarted.html");
    exit;
}

// Ambil user_id dari session
$user_id = $_SESSION["user_id"];
$username = $_SESSION["username"];
// var_dump($user_id);
// var_dump($username); die;
// Gunakan user_id dalam query untuk memuat data yang terkait
$moneyoncash = moneyoncash("SELECT * FROM `MoneyOncash` WHERE user_id = ?", $user_id);
$mines = mines("SELECT * FROM `mines` WHERE user_id = ?", $user_id);
$JumlahTotal = JumlahTotal("SELECT * FROM `JumlahTotal` WHERE user_id = ?", $user_id);
$moneys = money("SELECT * FROM `Money` WHERE user_id = ?", $user_id);


?>



  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <title>KalkoaTor</title>
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
        crossorigin="anonymous"
      />
      <link rel="shortcut icon" href="../assets/favicon.jpg" type="image/x-icon">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
      <script src="https://cdn.tailwindcss.com"></script>
  <!-- ...or, you may also directly use a CDN :-->
  <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.8.1"></script>
  <!-- ...or -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/autonumeric/4.8.1/autoNumeric.min.js"></script>
  <!-- ...or -->
  <script src="https://unpkg.com/autonumeric"></script>
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
      <p class="px-2"> Selamat <?= waktu() ?>, <?= $username ?>  </p>
      <div class="container px-4 text-center">

      <?php foreach($moneyoncash as $cash) : ?>
    <div class="row gx-5">
        <span class="hidden cashOnid"><?= $cash["id"] ?></span>
        <div class="col">
            <div class="p-3">
                <?= $cash["task"] ?>: Rp.&nbsp;<?= number_format($cash["nominal"], 0, ',', '.') ?>
            </div>
        </div>
        <div class="col mt-4">
            <button
                type="button"
                class="tampilCashOnModal btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl  dark:focus:ring-blue-800 "
                data-bs-toggle="modal"
                data-bs-target="#editCashOncashier"
                cashOnid="<?= $cash["id"] ?>"
            >
                Edit cepat
            </button>
        </div>
    </div>
<?php endforeach; ?>

 


    <?php foreach($JumlahTotal as $Total) :?>
    <div class="row gx-5 ">
      <span class="hidden" id="Catataid"><?= $Total["id"] ?></span>
      <div class="col">
        <div class="p-3">Uang tercatat: Rp.&nbsp;<?= number_format($Total["nominal"], 0, ',', '.') ?></div>
      </div>
      <div class="col mt-4">
        <button
          type="button"
          class="showpopupcatat btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl  dark:focus:ring-blue-800"
          data-bs-toggle="modal"
          data-bs-target="#showpopupcatat"
          Catataid = <?= $Total["id"] ?>
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
        <div class="p-3">Uang Mines : Rp.&nbsp;<?= number_format($rugi["nominal"], 0, ',', '.') ?>
      </div>
      </div>
      <div class="col mt-4">
      <button
      type="button"
      class="buttonrugi  btn btn-primary bg-gradient-to-br text-black from-purple-600 to-blue-500 hover:bg-gradient-to-bl  dark:focus:ring-blue-800"
      data-bs-toggle="modal"
      data-bs-target="#tampilrugiOnModal"
      RugiOnid="<?= $rugi["id"] ?>"
  >
      Edit cepat
  </button>
      </div>
    </div>
      </div>
    <?php endforeach; ?>
    
      <div class=" text-center ">
      <h1 class="text-black font-extrabold text-3xl py-3">Uang di kasir saat ini</h1>
      <?php foreach($moneys as $money) :?>
    <div class="row align-items-center m-4 ">
      <div class="col-4">
      <img src="../assets/<?= $money["image"] ?>" alt="money" srcset="" class="w-full">
      </div>
      <div class="col text-black font-bold text-2xl">
        <span><?= $money["nominal"] ?></span>
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



  <!-- Foooter -->
<section class="bg-white">
    <div class="max-w-screen-xl px-4 py-12 mx-auto space-y-8 overflow-hidden sm:px-6 lg:px-8">
        <nav class="flex flex-wrap justify-center -mx-5 -my-2">
            <div class="px-5 py-2">
                <a href="" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                    Account
                </a>
            </div>
            <div class="px-5 py-2">
            <a href="login/logout.php" class="text-base leading-6 text-gray-500 hover:text-gray-900">
                   Log out
               </a>
            </div>
        </nav>
        <div class="flex justify-center mt-8 space-x-6">
            <a href="https://facebook.com/wilypradana" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Facebook</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="https://instagram.com/wxhzyyy" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Instagram</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                </svg>
            </a>
            <a href="github.com/wilypradana" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">GitHub</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd"></path>
                </svg>
            </a>
        </div>
        <p class="mt-8 text-base leading-6 text-center text-gray-400">
            © 2023 kalkoadev, Inc. All rights reserved.
        </p>
    </div>
</section>
    <!-- modal oncash-->
    <div class="modal fade" id="editCashOncashier" tabindex="-1" aria-labelledby="editCashOncashierLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editCashOncashierLabel">Edit cepat</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body font-bold text-black">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="editCashOnModal" class="form-label">Edit cepat</label>
                        <input  type="hidden" name="money_id" id="input_id"/>
                  <input
                    type="text"
                    class="form-control"
                    id="editCashOnModal"
                    name="editCashOnModal"
                    autocomplete="off"
                  
                  />
                        <div id="emailHelp" class="form-text">fokus dan tetap semangattt</div>
                    </div>
                    <button type="submit" class="btn btn-primary bg-red-600" name="update_cashier">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>



      
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
            <form action="" method="POST">
                <div class="mb-3">
                  <label for="tampilCashOncatat" class="form-label hidden"
                    >Edit cepat</label
                  >
                  <input type="hidden" name="catat_Id" id="catat_id" />
                  <input
                    type="text"
                    class="form-control"
                    id="editCashOncatat"
                    name="inputCatat"
                    autocomplete="off"
                  />
                  <div class="form-text text-start">
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
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="tampilCashOnModal" class="form-label"
                    >Edit cepat</label
                  >
                  <input type="hidden" name="rugi_id" id="rugi_id"/>
                  <input 
                    type="text"
                    class="form-control"
                    id="editRugiOnModal"
                    name="insertRugi"
                    autocomplete="off"
                  
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
              <form action="" method="POST">
                <div class="mb-3">
                  <label for="tampilCashOnModal" class="form-label"
                    >Edit cepat</label
                  >
                  <input  type="hidden" name="money_id" id="money_id"/>
                  <input
                    type="text"
                    class="form-control"
                    id="editMoneyOnModal"
                    name="inputMoney"
                    autocomplete="off"
                  
                  />
                  <div id="emailHelp" class="form-text">
                    fokus dan tetap semangattt
                  </div>
                </div>
                <button type="submit" class="btn btn-primary bg-red-600" name="update_money">
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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
      <script src="app.js"></script>
    <script>
      // Inisialisasi AutoNumeric pada input dengan id "editCashOnModal"
  new AutoNumeric('#editCashOnModal', {
    currencySymbol: 'Rp ',
    decimalCharacter: ',',
    digitGroupSeparator: '.',
    unformatOnSubmit: true,
  });

  new AutoNumeric('#editCashOncatat', {
    currencySymbol: 'Rp ',
    decimalCharacter: ',',
    digitGroupSeparator: '.',
    unformatOnSubmit: true,
  });

  new AutoNumeric('#editRugiOnModal', {
    currencySymbol: 'Rp ',
    decimalCharacter: ',',
    digitGroupSeparator: '.',
    unformatOnSubmit: true,
  });

    </script>
    </body>
  </html>