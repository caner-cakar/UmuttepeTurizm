<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Umuttepe Turizm</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta property="og:title" content=""/>
		<meta property="og:image" content=""/>
		<meta property="og:url" content=""/>
		<meta property="og:site_name" content=""/>
		<meta property="og:description" content=""/>
		<meta name="twitter:title" content="" />
		<meta name="twitter:image" content="" />
		<meta name="twitter:url" content="" />
		<meta name="twitter:card" content="" />
		<link rel="shortcut icon" href="<?php echo base_url(); ?>images/favicon.ico">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css ">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/icomoon.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/superfish.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/magnific-popup.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap-datepicker.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/cs-select.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/cs-skin-border.css">
		
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>css/koltuk.css">



		<script src="js/modernizr-2.6.2.min.js"></script>
        <style>
        /* Ek CSS ayarlamaları */
        .form-group {
            text-align: left;
            vertical-align: middle;
        }

      

        .secenekler input[type="checkbox"] {
            width: auto;
			margin: 0; padding: 0;
			height:10px;
			float: left;
			z-index: 1;
            position: relative;
            left: 100px;
            vertical-align: middle;
        }
		.secenekler::after{
			clear: both;
			content: "";
			display: block;
		}

        .secenekler label {
            width: auto;
            font-size: 12px;
			margin-top: -5px;
            float: left;
            left: 0px;
            position: relative;
        }

       
    </style>

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
	
        </div>
		</div>
        
        <div class="fh5co-tours">
					<div class="container" >
						<div class="row">
								<div class="form-group" style="margin-top: 40px; text-align:center">
								
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
</body>
<script>
	var koltukSayisi = document.getElementById('koltukSayisi');	
	var secilenKoltuklar = <?= json_encode($_POST['secilenKoltuklar']) ?>;
	var ucret = 0;
	var seferID = <?= json_encode($_POST['seferID']) ?>;
	var seferler = <?php echo json_encode($seferler); ?>;
	if (seferID.length > 0 && seferler.length > 0) {
		for (var i = 0; i < seferID.length; i++) {
			// Seferler dizisinde ilgili seferi bul
			var sefer = seferler.find(sefer => sefer.seferID === seferID);
			if (sefer) {
				// Sefer bulundu, ücreti al
				ucret = sefer.ucret;
			} else {
				console.log("Sefer ID: " + currentSeferID + " için sefer bulunamadı.");
			}
		}
	} else {
		console.log("Hata: Sefer ID'ler veya seferler dizisi boş.");
	}

	document.addEventListener('DOMContentLoaded', function() {

		var counter = 1;
		var formHtml = '';
		
		var formHtml = '<form id="biletBilgileri" method="post" name="biletBilgileri" action="<?= base_url('main/odeme'); ?>" onsubmit="return biletKontrol()" >';


		secilenKoltuklar.forEach(function(koltukId) {
			formHtml += '<div class="row" id="bilgi' + counter + '" style="margin-bottom: 20px;">';
			
			formHtml += '<div class="col-md-2">';
			formHtml += '<div style="display: flex; justify-content: center; align-items: center;">';
			formHtml += '<input style="border:none; font-weight:lighter;margin-right:50px; margin-top:-100px; width: 25px; text-align: center;" type="text" id="koltukId_' + counter + '" value="' + koltukId + '" name="koltukId_' + counter + '" value="' + koltukId + '" readonly><br>'; // Input'u ortala
			formHtml += '<div class="secenekler">';
			formHtml += '<input type="checkbox" id="yasli' + counter + '" name="yasli' + counter + '" value="65"> ';
			formHtml += '<label for="yasli' + counter + '">65 yaş üzeri</label><br>';
			formHtml += '<input type="checkbox" id="memur' + counter + '" name="memur' + counter + '" value="65"> ';
			formHtml += '<label for="memur' + counter + '">Memur</label><br>';
			formHtml += '<input type="checkbox" id="guvenlik' + counter + '" name="guvenlik' + counter + '" value="65"> ';
			formHtml += '<label for="guvenlik' + counter + '">Güvenlik</label><br>';
			formHtml += '<input type="checkbox" id="cocuk' + counter + '" name="cocuk' + counter + '" value="7"> ';
			formHtml += '<label for="cocuk' + counter + '">7 yaş altı</label><br>';
			formHtml += '<input type="checkbox" id="ogrenci' + counter + '" name="ogrenci' + counter + '" value="18"> ';
			formHtml += '<label for="ogrenci' + counter + '">Öğrenci</label><br>';
			formHtml += '<hr>';
			formHtml += '</div>';
			formHtml += '</div>'; 
			formHtml += '</div>'; 

			formHtml += '<div class="col-md-2" style="margin-top:50px">';
			formHtml += '<input type="text" class="form-control" id="tcKimlikNo' + counter + '" name="tcKimlikNo' + counter + '" style="margin-left:50px" placeholder="TC Kimlik No">';
			formHtml += '</div>';
			formHtml += '<div class="col-md-2" style="margin-top:50px">';
			formHtml += '<input type="text" class="form-control" id="yolcuAdi' + counter + '" name="yolcuAdi' + counter + '" style="margin-left:50px" placeholder="Yolcu Adı">';
			formHtml += '</div>';
			formHtml += '<div class="col-md-2" style="margin-top:50px">';
			formHtml += '<input type="text" class="form-control" id="yolcuSoyadi' + counter + '" name="yolcuSoyadi' + counter + '" style="margin-left:50px" placeholder="Yolcu Soyadı">';
			formHtml += '</div>';
			formHtml += '<div class="col-md-2" style="margin-top:50px">';
			formHtml += '<label style="margin-left:50px; margin-top:5px" for="ucret' + counter + '">Fiyat: </label>'; 
			formHtml += '<input type="text" style="border:none;margin-top:-100px; width: 50px; text-align: center;" name="ucret' + counter + '" id="ucret' + counter + '" value="' + (ucret) + '" readonly><br>';
			formHtml += '</div>'; 
			formHtml += '</div>'; 
			counter++;
		});

		formHtml += '<label style="margin-left:50px; margin-top:5px" name="koltukSayisi">Toplam Koltuk Sayısı: </label>'; 
		formHtml += '<input type="text" style="border:none;margin-top:-100px; width: 25px; text-align: center;" id="koltukSayisi" name="koltukSayisi" value="' + (counter-1) + '" readonly><br>';
		formHtml += '<label style="margin-left:50px; margin-top:5px" name="koltukSayisi">Sefer No: </label>'; 
		formHtml += '<input type="text" style="border:none;margin-top:-100px; width: 25px; text-align: center;" name="seferID" id="seferID" value="' + (seferID) + '" readonly><br>';
		formHtml += '<div style="text-align: center; margin-bottom:20px">';
		formHtml += '<input type="text" style="border:none;margin-top:-100px; width: 25px; text-align: center;" name="toplamUcret" id="toplamUcret" readonly><br>';

		formHtml += '<button id="odemeButton" type="submit" class="btn btn-primary">Ödemeye Geç</button>';
		formHtml += '</div>'; 
		formHtml += '</form>';

		var formContainer = document.querySelector('.form-group');
		formContainer.innerHTML = formHtml;
		document.getElementById('odemeButton').addEventListener('click', function() {
		var toplamUcret = 0;
		for (var i = 1; i <= counter-1; i++) {
			var ucret = parseFloat(document.getElementById('ucret' + i).value);
			toplamUcret += ucret;
		}
		document.getElementById('toplamUcret').value = +toplamUcret;
	});
	});
	
	



	function showError(message) {
		Swal.fire({
			icon: 'error',
			title: 'Hata!',
			text: message,
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Tamam'
		});
	}

	function biletKontrol() {
		var toplamUcret = 0;
		var koltukSayisi = document.getElementById('koltukSayisi');	
		for (var i = 1; i <= koltukSayisi.value; i++) {
			var tcKimlikNo = document.getElementById('tcKimlikNo' + i);
			var yolcuAdi = document.getElementById('yolcuAdi' + i);
			var yolcuSoyadi = document.getElementById('yolcuSoyadi' + i);
			var ucret = document.getElementById('ucret' + i);

			const yasliCheckbox = document.getElementById('yasli' + i);
			const cocukCheckbox = document.getElementById('cocuk' + i);
			const ogrenciCheckbox = document.getElementById('ogrenci' + i);

			// Checkbox'ların durumunu kontrol edin
			const yasliSecili = yasliCheckbox.checked;
			const cocukSecili = cocukCheckbox.checked;
			const ogrenciSecili = ogrenciCheckbox.checked;

			if (tcKimlikNo.value.length !== 11 || isNaN(tcKimlikNo.value)) {
				showError("TC Kimlik No 11 haneli olmalı");
				return false; // Döngüden çık
			}else if (yolcuAdi.value.length < 2 || !/^[a-zA-ZüğşıöçĞÜŞİÖÇ\s]+$/.test(yolcuAdi.value)) {
				showError("Ad ve Soyad Kısımlarını Doğru Doldurun");
				return false; // Döngüden çık
			}else if (yolcuSoyadi.value.length < 2 || !/^[a-zA-ZüğşıöçĞÜŞİÖÇ\s]+$/.test(yolcuSoyadi.value)) {
				showError("Ad ve Soyad Kısımlarını Doğru Doldurun");
				return false; // Döngüden çık
			}else{
				toplamUcret += +ucret.value; 
				return true;	
			}
		}
		showError(toplamUcret);
		return false;
		
	}
	
	
	window.addEventListener('DOMContentLoaded', (event) => {
		const koltukSayisi = document.getElementById('koltukSayisi');
		
		for (let i = 1; i <= koltukSayisi.value; i++) {
			const divCheckboxlar = document.getElementById('bilgi' + i);
			const checkboxlar = divCheckboxlar.querySelectorAll('input[type="checkbox"]');
			
			checkboxlar.forEach((checkbox) => {
				checkbox.addEventListener('change', () => {
					if (checkbox.checked) {
						if (checkbox.id === 'yasli' + i) {
							var newUcret = ucret * 0.85;
							document.getElementById('ucret' + i).value = newUcret; 
						} else if (checkbox.id === 'cocuk' + i) {
							var newUcret = ucret * 0;
							document.getElementById('ucret' + i).value = newUcret; 
						} else if (checkbox.id === 'ogrenci' + i) {
							var newUcret = ucret * 0.85;
							document.getElementById('ucret' + i).value = newUcret; 
						}
						else if(checkbox.id === 'guvenlik' + i){
							var newUcret = ucret * 0;
							document.getElementById('ucret' + i).value = newUcret; 
						}else if(checkbox.id === 'memur' + i){
							var newUcret = ucret * 0.85;
							document.getElementById('ucret' + i).value = newUcret; 
						}
						
						uncheckOtherCheckboxes(checkbox.id, i);
					} else {
						console.log(checkbox.id + ' seçimi kaldırıldı.');
						// Checkbox seçimi kaldırılırsa yapılacak işlemler buraya eklenir
					}
				});
			});
		}
	});

function uncheckOtherCheckboxes(checkedCheckboxId, counter) {
    const divCheckboxlar = document.getElementById('bilgi' + counter);
    const checkboxlar = divCheckboxlar.querySelectorAll('input[type="checkbox"]');
    
    checkboxlar.forEach((checkbox) => {
        if (checkbox.id !== checkedCheckboxId && checkbox.checked) {
            checkbox.checked = false;
        }
    });
}



		

</script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
		


	</body>
</html>
