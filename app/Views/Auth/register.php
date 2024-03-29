<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kayıt Ol</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datepicker.min.css">
    

</head>
<body>
    <div class="container">
        <div class="row" style="margin-top: 45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Kayıt Ol</h4>
                <form action="<?= base_url('auth/save'); ?>" method="post" autocomplete="off">
                <?= csrf_field(); ?>
                <?php if(!empty(session()->getFlashdata('fail'))) :  ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                <?php endif ?>
                <?php if(!empty(session()->getFlashdata('success'))) :  ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                <?php endif ?>

                
                    <div class="form-group">
                        <label for="">TC Kimlik No</label>
                        <input type="text" class="form-cotrol" name="tcKimlik" placeholder="TC Kimlik No girin"
                         value="<?= set_value('tcKimlik'); ?>">
                         <span class="text-danger"><?= isset($validation) ? display_error($validation,'tcKimlik') : '' ?></span>
                        
                    </div>
                    <div class="form-group">
                        <label for="">Ad</label>
                        <input type="text" class="form-cotrol" name="ad" placeholder="Adınızı girin" value="<?= set_value('ad'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'ad') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Soyad</label>
                        <input type="text" class="form-cotrol" name="soyad" placeholder="Soyadınızı girin" value="<?= set_value('soyad'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'soyad') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Doğum Tarihi</label>
                        <input type="date" id="dogumTarihi" name="dogumTarihi" max="<?= date("Y-m-d", strtotime("-18 years")); ?>" 
                        value="<?= set_value('dogumTarihi'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'dogumTarihi') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" class="form-cotrol" name="mail" placeholder="Mailinizi girin" value="<?= set_value('mail'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'mail') : '' ?></span>
                    </div>
                    <div class="form-group">
                        <label for="">Şifre</label>
                        <input type="password" class="form-cotrol" name="sifre" placeholder="Şifrenizi girin" value="<?= set_value('sifre'); ?>">
                        <span class="text-danger"><?= isset($validation) ? display_error($validation,'sifre') : '' ?></span>
                    </div>

                    <div class="form-group">
    
                        <button class="btn btn-primary btn-block" type="submit">Kayıt Ol</button>
                    </div>
                    <br>
                    <a href="<?= site_url('auth/login') ?>">Hesabın var mı? Giriş Yap</a>
                </form>
                    
            </div>
        </div>
    </div>
</body>

</html>
