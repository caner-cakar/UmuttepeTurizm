<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Umuttepe Turizm</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/login.css">
    </head>
    <body>
        <div class="container">
        <div class="box form-box">

            <header>Kayıt Ol</header>
            <form id="registerForm" method="post">
                <div class="field input">
                    <label for="tcKimlik">TC Kimlik No</label>
                    <input type="text" name="tcKimlik" id="tcKimlik" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="ad">Ad</label>
                    <input type="text" name="ad" id="ad" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="soyad">Soyad</label>
                    <input type="text" name="soyad" id="soyad" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="dogumTarihi">Doğum Tarihi</label>
                    <input type="date" id="dogumTarihi" name="dogumTarihi" max="<?= date("Y-m-d", strtotime("-18 years")); ?>">
                </div>

                <div class="field input">
                    <label for="email">Mail</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="sifre">Şifre</label>
                    <input type="password" name="sifre" id="sifre" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" class="btn" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Zaten Üye misin? <a href="login.php">Giriş Yap</a>
                </div>
            </form>
        </div>
      </div>
    </body>
</html>