
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Umuttepe Turizm</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css ">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/superfish.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datepicker.min.css">
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/cs-skin-border.css">
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/koltuk.css">



		<script src="js/modernizr-2.6.2.min.js"></script>


	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">

		<header id="fh5co-header-section" class="sticky-banner">
			<div class="container">
				<div class="nav-header">
					<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle dark"><i></i></a>
					<h1 id="fh5co-logo"><a href="<?= base_url('main/index'); ?>">Umuttepe Turizm</a></h1>
					<!-- START #fh5co-menu-wrap -->
					<nav id="fh5co-menu-wrap" role="navigation">
						<ul class="sf-menu" id="fh5co-primary-menu">
							<li class="active"><a href="<?= base_url('main/index'); ?>">Ana Sayfa</a></li>
							<li><a href="<?= base_url('dashboard/account'); ?>">Hesabım</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->
	
		<div id="fh5co-tours" class="fh5co-section-gray" style="display: block;">

        <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center animate-box fadeInUp animated">
            
            <form id="payment-form" method="post" action="<?= base_url('main/odemeTamamlama'); ?>" onsubmit=" return kartBilgileriKontrol()">
                
                <div>
                    <label for="seferNo">Sefer No:</label>
                    <input style="border:none;margin-top:-100px; width: 50px; text-align: center; color:##F5F5F5" type="text" name="seferID" id="seferID" value="<?php echo $_POST["seferID"]?>" readonly>
                    <label for="toplamUcret">Toplam Ucret:</label>
                    <input style="border:none;margin-top:-100px; width: 50px; text-align: center; color:##F5F5F5" type="text" name="toplamUcret" id="toplamUcret" value="<?php echo $toplamUcret ?>" readonly>
                    <label for="koltukNumaralari">Koltuk Numaraları:</label>
                    <?php if (!empty($secilenKoltuklar)): ?>
                        <?php foreach ($secilenKoltuklar as $index => $koltuk): ?>
                            <!-- Her bir koltuk numarasını readonly bir input alanında gösterelim -->
                            <input style="border:none;margin-top:-100px; width: 50px; text-align: center; color:##F5F5F5"  type="text" id="koltuk_<?php echo $index; ?>" name="secilenKoltuklar[]" value="<?php echo $koltuk; ?>" readonly>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Hiçbir koltuk seçilmemiş.</p>
                    <?php endif; ?>
                </div>
                <br>
                <div class="form-group">
                    <label for="full-name">Ad Soyad</label>
                    <input type="text" class="form-control" id="full-name" placeholder="Ad Soyadınızı Girin" >
                </div>
                <div class="form-group">
                    <label for="card-number">Kredi Kartı Numarası</label>
                    <input type="text" class="form-control" id="card-number" placeholder="Kredi Kartı Numaranızı Girin">
                </div>
                <div class="form-group">
                    <label for="expiry-date">Son Kullanma Tarihi</label>
                    <input type="date" class="form-control" id="expiry-date" name="expiry-date" min="<?= date("Y-m-d", strtotime('+1 day')); ?>">
                </div>
                <div class="form-group">
                    <label for="cvc">CVC</label>
                    <input type="text" class="form-control" id="cvc" placeholder="CVC Kodu" >
                </div>
                <button type="submit" class="btn btn-primary">Ödemeyi Yap</button>
            </form>
        </div>
    </div>
</div>

		</div>
    </div>
	
	<footer>
						<div id="footer">
							<div class="container">
								<div class="row row-bottom-padded-md">
									<h1 style="text-align: center; color:aliceblue">UmuttepeTurizm</h1>
									</div>
								</div>
							</div>
							
			</div>
		
		</div>
		</footer>
	</div>

	</div>
	</body>	
	</div>
	
	<script>
      

        function kartBilgileriKontrol() {
            var adSoyad = document.getElementById('full-name').value;
            var kartNo = document.getElementById('card-number').value;
            var sonTarih = document.getElementById('expiry-date').value;
            var cvc = document.getElementById('cvc').value;

            var kartNoRegex = /^[0-9]{16}$/;

            if (!kartNoRegex.test(kartNo) || kartNo.length !== 16) {
                showError("Kart numarasını düzgün giriniz.");
                return false;
            } else if (adSoyad.length < 4 || !/^[a-zA-ZüğşıöçĞÜŞİÖÇ\s]+$/.test(adSoyad)) {
                showError("Adınızı ve soyadınızı düzgün giriniz.");
                return false;
            } else if (!Date.parse(sonTarih)) {
                showError("Lütfen son kullanma tarihini giriniz.");
                return false;
            } else if (isNaN(cvc) || cvc.length !== 3) {
                showError("Lütfen CVC numarasını doğru giriniz.");
                return false;
            } else {
                return true;	
            }
        }


        
		function showError(message) {
			Swal.fire({
				icon: 'error',
				title: 'Hata!',
				text: message,
				confirmButtonColor: '#3085d6',
				confirmButtonText: 'Tamam'
			});
		}
	</script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!--#region scripts  -->

	
	<script src="<?php echo base_url()?>js/jquery.min.js"></script>
	<script src="<?php echo base_url()?>js/jquery.easing.1.3.js"></script>
	<script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>js/jquery.waypoints.min.js"></script>
	<script src="<?php echo base_url()?>js/sticky.js"></script>
	<script src="<?php echo base_url()?>js/jquery.stellar.min.js"></script>
	<script src="<?php echo base_url()?>js/hoverIntent.js"></script>
	<script src="<?php echo base_url()?>js/superfish.js"></script>
	<script src="<?php echo base_url()?>js/jquery.magnific-popup.min.js"></script>
	<script src="<?php echo base_url()?>js/magnific-popup-options.js"></script>
	<script src="<?php echo base_url()?>js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url()?>js/classie.js"></script>
	<script src="<?php echo base_url()?>js/selectFx.js"></script>
	<script src="<?php echo base_url()?>js/main.js"></script>
	</body>
<!--#endregion -->
</html>
