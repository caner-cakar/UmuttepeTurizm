
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
                    <label for="from-place">Nereden:</label>
                    <label id="from-place" for="from-place"><?php echo $_POST["from-place"]; ?></label>

                    <label>Nereye:</label>
                    <label id="to-place"><?php echo $_POST["to-place"]; ?></label>

                    <label>Gidiş Tarihi:</label>
                    <label id="gidistarihi"><?php echo $_POST["gidisTarih"]; ?></label>

					<label>Dönüş Tarihi:</label>
                    <label id="gelisTarih"><?php echo $_POST["gelisTarih"]; ?></label>
                </div>
				<div class="col-md-8 col-md-offset-2 text-center animate-box fadeInUp animated">
                </div>
            </div>

			
			<div style="display: flex; align-items: center; justify-content: center;">
				<div id="gelis" class="display: flex;text-center animate-box fadeInUp animated" style="width:300px;height:1050px;float: left;">
					<div class="">
						<h1 style="margin-bottom: 50px;">Gidiş</h1>
						</div>
					</div>
				<div id="donus" class="display: flex;text-center animate-box fadeInUp animated"style="width:300px;height:1050px;float: left;">
					<?php
					// "gelisTarih" post değeri isset ile kontrol edilir
					if (isset($_POST['gelisTarih'])) {
						// Eğer "gelisTarih" post değeri set edilmişse, bu blok çalışır
						$gelisTarih = $_POST['gelisTarih'];
						// "gelisTarih" boş değilse
						if (!empty($gelisTarih)) {
							echo '<div class="">';
							echo '<h1 style="margin-bottom: 50px;">Dönüş</h1>';
							echo '</div>';
						}
					}
					?>
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
							</footer>
	</div>

	</div>
	</body>	
	<script>
        var kalkisSehir = +sehirDegeriniAyarla(document.getElementById("from-place").innerText);
        var gidisSehir = +sehirDegeriniAyarla(document.getElementById("to-place").innerText);
        var cikisZamani = document.getElementById("gidistarihi").innerText;
		var gelisTarih = document.getElementById("gelisTarih").innerText;
		var seferID;
		var gidisveyaDonus ="";
	
        
		setTimeout(function() {
			var seferler = <?php echo json_encode($seferler); ?>;
			for (var i = 0; i < seferler.length; i++) {
				if (+seferler[i]['kalkisSehir'] === +kalkisSehir && +seferler[i]['varisSehir'] === +gidisSehir && ""+seferler[i]['cikisZamani'] === ""+cikisZamani) {
					seferID = +seferler[i]['seferID'];
					writeSefer(seferler[i], i, 'var','gelis');
				}
				if (gelisTarih !=='' && +seferler[i]['kalkisSehir'] === +gidisSehir && +seferler[i]['varisSehir'] === +kalkisSehir && ""+seferler[i]['cikisZamani'] === ""+gelisTarih) {
						seferID = +seferler[i]['seferID'];
						writeSefer(seferler[i], i, 'yok','donus');
				}
			}        
		}, 100); 

		function writeSefer(sefer, index,gelisTarih, hangiSefer) {
		
			if(gelisTarih !==''){
				var seferDiv;
				if (hangiSefer === 'gelis') {
					seferDiv = document.getElementById('gelis');
				} else if (hangiSefer === 'donus') {
					seferDiv = document.getElementById('donus');
				}

				var originalContainer = document.createElement('div');
				originalContainer.className = 'container';

				var rowDiv = document.createElement('div');
				rowDiv.className = 'row';
				rowDiv.id = 'sefer_' + index;

				var colDiv = document.createElement('div');
				colDiv.className = '';

				var pTag = document.createElement('p');
				pTag.style.color = 'black';

				var gedisBaslik = document.createElement('h4');
				gedisBaslik.textContent = 'Sefer Bilgileri';

				var cikisSpan = createSpanElement('cikis_' + index, 'Çıkış Zamanı:', sefer['cikisZamani'], sefer['cikisSaati']);
				var varisSpan = createSpanElement('varis_' + index, 'Varış Zamanı:', sefer['varisZamani'], sefer['varisSaati']);
				var yolsureSpan = createSpanElement('yolsure_' + index, 'Yolculuk Süresi:', sefer['yolculukSuresi'] + ' Saat');
				var otobusadSpan = createSpanElement('otobusad_' + index, 'Otobüs Adı:', sefer['otobusAdi']);
				var koltuktipSpan = createSpanElement('koltuktip_' + index, 'Koltuk Tipi:', sefer['koltukTipi']);
				var ucretSpan = createSpanElement('ucret_' + index, 'Ücret:', sefer['ucret'] + ' TL');

				var form = document.createElement('form');
				form.id = 'form_' + index;
				form.action = '<?= base_url('main/koltuklar'); ?>';
				form.method = 'post';

				var input = document.createElement('input');
				input.id = 'button_' + index;
				input.className = 'btn btn-primary';
				input.type = 'submit';
				input.name = 'sec';
				input.value = 'Seferi Seç';

				var input2 = document.createElement('input');
				input2.type = 'text';
				input2.id = 'seferID_' + index;
				input2.name = 'seferID';
				input2.style.border = 'none';
				input2.style.marginTop = '-100px';
				input2.style.width = '25px';
				input2.style.textAlign = 'center';
				input2.readOnly = true;
				input2.value = sefer['seferID'];
				input2.style.backgroundColor = '#f5f5f5';

				var input3 = document.createElement('input');
				input3.type = 'hidden';
				input3.id = 'from-place';
				input3.name = 'from-place';
				input3.value = "" + gidisSehir;

				var input4 = document.createElement('input');
				input4.type = 'hidden';
				input4.id = 'to-place';
				input4.name = 'to-place';
				input4.value = "" + kalkisSehir;

				var input5 = document.createElement('input');
				input5.type = 'hidden';
				input5.id = 'gelisTarih';
				input5.name = 'gelisTarih';
				input5.value = "" + gelisTarih;

				var label = document.createElement('label');
				label.for = 'seferID_' + index;
				label.innerText = ':Sefer Numarası';
				label.style.fontWeight = 'lighter';

				pTag.appendChild(gedisBaslik);
				pTag.appendChild(cikisSpan);
				pTag.appendChild(varisSpan);
				pTag.appendChild(yolsureSpan);
				pTag.appendChild(otobusadSpan);
				pTag.appendChild(koltuktipSpan);
				pTag.appendChild(ucretSpan);
				form.appendChild(input2);
				form.appendChild(input3);
				form.appendChild(input4);
				form.appendChild(input5);
				form.appendChild(label);
				form.appendChild(input);
				pTag.appendChild(form);
				
				colDiv.appendChild(pTag);
				rowDiv.appendChild(colDiv);
				originalContainer.appendChild(rowDiv);

				// İlgili seferDiv'e ekleme yapın
				seferDiv.appendChild(originalContainer);

			}else{
				var seferDiv;
				if (hangiSefer === 'gelis') {
					seferDiv = document.getElementById('gelis');
				} else if (hangiSefer === 'donus') {
					seferDiv = document.getElementById('donus');
				}

				var originalContainer = document.createElement('div');
				originalContainer.className = 'container';

				var rowDiv = document.createElement('div');
				rowDiv.className = 'row';
				rowDiv.id = 'sefer_' + index;

				var colDiv = document.createElement('div');
				colDiv.className = '';

				var pTag = document.createElement('p');
				pTag.style.color = 'black';

				var gedisBaslik = document.createElement('h4');
				gedisBaslik.textContent = 'Sefer Bilgileri';

				var cikisSpan = createSpanElement('cikis_' + index, 'Çıkış Zamanı:', sefer['cikisZamani'], sefer['cikisSaati']);
				var varisSpan = createSpanElement('varis_' + index, 'Varış Zamanı:', sefer['varisZamani'], sefer['varisSaati']);
				var yolsureSpan = createSpanElement('yolsure_' + index, 'Yolculuk Süresi:', sefer['yolculukSuresi'] + ' Saat');
				var otobusadSpan = createSpanElement('otobusad_' + index, 'Otobüs Adı:', sefer['otobusAdi']);
				var koltuktipSpan = createSpanElement('koltuktip_' + index, 'Koltuk Tipi:', sefer['koltukTipi']);
				var ucretSpan = createSpanElement('ucret_' + index, 'Ücret:', sefer['ucret'] + ' TL');

				var form = document.createElement('form');
				form.id = 'form_' + index;
				form.action = '<?= base_url('main/koltuklar'); ?>';
				form.method = 'post';

				var input = document.createElement('input');
				input.id = 'button_' + index;
				input.className = 'btn btn-primary';
				input.type = 'submit';
				input.name = 'sec';
				input.value = 'Seferi Seç';

				var input2 = document.createElement('input');
				input2.type = 'text';
				input2.id = 'seferID_' + index;
				input2.name = 'seferID';
				input2.style.border = 'none';
				input2.style.marginTop = '-100px';
				input2.style.width = '25px';
				input2.style.textAlign = 'center';
				input2.readOnly = true;
				input2.value = sefer['seferID'];
				input2.style.backgroundColor = '#f5f5f5';

				var input3 = document.createElement('input');
				input3.type = 'hidden';
				input3.id = 'from-place';
				input3.name = 'from-place';
				input3.value = "" + gidisSehir;

				var input4 = document.createElement('input');
				input4.type = 'hidden';
				input4.id = 'to-place';
				input4.name = 'to-place';
				input4.value = "" + kalkisSehir;

				var input5 = document.createElement('input');
				input5.type = 'hidden';
				input5.id = 'gelisTarih';
				input5.name = 'gelisTarih';
				input5.value = "" + gelisTarih;

				var label = document.createElement('label');
				label.for = 'seferID_' + index;
				label.innerText = ':Sefer Numarası';
				label.style.fontWeight = 'lighter';

				pTag.appendChild(gedisBaslik);
				pTag.appendChild(cikisSpan);
				pTag.appendChild(varisSpan);
				pTag.appendChild(yolsureSpan);
				pTag.appendChild(otobusadSpan);
				pTag.appendChild(koltuktipSpan);
				pTag.appendChild(ucretSpan);
				form.appendChild(input2);
				form.appendChild(input3);
				form.appendChild(input4);
				form.appendChild(input5);
				form.appendChild(label);
				form.appendChild(input);
				pTag.appendChild(form);
				
				colDiv.appendChild(pTag);
				rowDiv.appendChild(colDiv);
				originalContainer.appendChild(rowDiv);

				// İlgili seferDiv'e ekleme yapın
				seferDiv.appendChild(originalContainer);
			}
	
		}




		function createSpanElement(id, labelText, ...textContents) {
			var span = document.createElement('span');
			span.id = id;
			span.innerHTML = labelText;
			textContents.forEach(content => {
				span.appendChild(document.createTextNode(content));
				span.appendChild(document.createElement('br'));
			});
			return span;
		}
        
        function sehirDegeriniAyarla(sehir) {
			var deger;

			switch(sehir) {
				case "İstanbul":
					deger = 1;
					break;
				case "Ankara":
					deger = 2;
					break;
				case "İzmir":
					deger = 3;
					break;
				case "Kocaeli":
					deger = 4;
					break;
				default:
					// Eğer yukarıdaki şehirlerden biri değilse, varsayılan bir değer atayabiliriz
					deger = 0;
			}
			return deger;
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
     <!--#endregion -->

	</body>
</html>
