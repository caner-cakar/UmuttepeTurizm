<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datepicker.min.css">
    

</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Giriş Yap</h4>
                <form action="<?= base_url('auth/check'); ?>" method="post">

                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) :  ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                

                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-cotrol" name="mail" placeholder="Mailinizi girin" value="<?= set_value('mail'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'mail') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Şifre</label>
                        <input type="password" class="form-cotrol" name="sifre" placeholder="Şifrenizi girin" >
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'sifre') : '' ?></span>
                    </div>

                    <div class="form-group">
                        <button class="btn btn-primary btn-block" type="submit">Giriş Yap</button>
                    </div>
                    
                </form>
                <br>
                    <a href="<?= site_url('auth/register') ?>">Hesabın yok mu? Kayıt Ol</a>
            </div>
        </div>
    </div>
</body>

</html>
