
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="<?= base_url() ?>assets/login/style.css" />
    <title><?php echo $title ?></title>
    <link href='<?php echo base_url("uploads/$logo"); ?>' rel='shortcut icon' type='image/x-icon' />
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
             <form action="<?= site_url('auth/proses') ?>" method="post">
            <h2 class="title">Selamat Datang!!</h2><br><br>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password"name="password" class="form-control" placeholder="Password" required>
            </div><br>
            <input type="submit" name="login" value="Masuk" class="btn solid">
            <br><br><br>
          </form>
        </div>
      </div>
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">

            <!-- <br> -->
             <h5>username: admin</h5>
            <h5>password:admin</h5> 
            <img src="<?= base_url() ?>assets/login/logo-220922-44a284eed9-removebg-preview.png" class="image" alt="tampnel" />
          </div>
        </div>
      </div>
    </div>
    <script src="<?= base_url() ?>assets/login/app.js"></script>
  </body>
</html>
