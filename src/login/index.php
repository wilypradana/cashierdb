<?php 
error_reporting(E_ALL);
require("../koneksi.php");

ini_set('display_errors', '1');

if (isset($_POST["login"])) {
    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

    $query = "SELECT * FROM User WHERE username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            session_start();
            $_SESSION["username"] = $row["username"];
            $_SESSION["user_id"] = $row["user_id"];

            // Penguncian (locking) session
            session_regenerate_id(true);

            header("Location: ../");
            exit;
        }
    }
    $error = true;
}


?>




<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="../assets/favicon.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .register-photo {
  background:#f1f7fc;
  padding:80px 0;
}

.register-photo .image-holder {
  display:table-cell;
  width:auto;
  background:url(../../assets/sayhello.jpeg);
  background-size:cover;
}

.register-photo .form-container {
  display:table;
  max-width:900px;
  width:90%;
  margin:0 auto;
  box-shadow:1px 1px 5px rgba(0,0,0,0.1);
}

.register-photo form {
  display:table-cell;
  width:400px;
  background-color:#ffffff;
  padding:40px 60px;
  color:#505e6c;
}

@media (max-width:991px) {
  .register-photo form {
    padding:40px;
  }
}

.register-photo form h2 {
  font-size:24px;
  line-height:1.5;
  margin-bottom:30px;
}

.register-photo form .form-control {
  background:#f7f9fc;
  border:none;
  border-bottom:1px solid #dfe7f1;
  border-radius:0;
  box-shadow:none;
  outline:none;
  color:inherit;
  text-indent:6px;
  height:40px;
}

.register-photo form .form-check {
  font-size:13px;
  line-height:20px;
}

.register-photo form .btn-primary {
  background:#f4476b;
  border:none;
  border-radius:4px;
  padding:11px;
  box-shadow:none;
  margin-top:35px;
  text-shadow:none;
  outline:none !important;
}

.register-photo form .btn-primary:hover, .register-photo form .btn-primary:active {
  background:#eb3b60;
}

.register-photo form .btn-primary:active {
  transform:translateY(1px);
}

.register-photo form .already {
  display:block;
  text-align:center;
  font-size:12px;
  color:#6f7a85;
  opacity:0.9;
  text-decoration:none;
}


    </style>
</head>

<body>
    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder relative">
                <span class="md:absolute  hidden bottom-0 images "><a href="https://www.freepik.com/premium-vector/portrait-smiling-young-man-saying-hello-waving-with-hand-hi-bye-gesture-happy-guy-greeting-welcoming-smb-colored-flat-vector-illustration-isolated-white-background_29732441.htm#query=say%20hello&position=43&from_view=search&track=ais">Source image</a></span>
            </div>
            <form method="post" action="">
                <h2 class="text-center"><strong>Login</strong>  account</h2>
                <?php if(isset($error)) : ?>
                <div class="alert alert-danger" role="alert">
                 Password / username salah
                 </div>
                 <?php endif; ?>
                <div class="form-group"><input class="form-control" id="username" type="username" name="username" placeholder="username" autocomplete="off"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password" required></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox">Rememmber me</label></div>
                </div>
                <div class="form-group already"><button class="btn btn-primary btn-block" type="submit" name="login">Sign In</button></div> <span class="text-sm">Dont have a account?</span> <a href="../register/"class="text-sm hover:text-blue-400">Sign Up here.</a></form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        const emailInput = document.getElementById('email');
        emailInput.addEventListener('input', validateEmail);
      
        function validateEmail() {
          const email = emailInput.value;
          const isGmail = email.endsWith('@gmail.com');
      
          if (!isGmail) {
            emailInput.setCustomValidity('Email yang anda input tidak valid');
          } else {
            emailInput.setCustomValidity('');
          }
        }
      </script>
</body>

</html>