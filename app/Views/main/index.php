
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
				
					<div class="fh5co-hero">
						<div class="fh5co-overlay"></div>
						<div id="errorContainer"></div>
						<div class="fh5co-cover" data-stellar-background-ratio="0.5">
							<div class="desc">
								<div class="container">
									<div class="row">
										<div class="col-sm-5 col-md-5">
											<div class="tabulation animate-box">

											<!-- Nav tabs -->
											<ul class="nav nav-tabs" role="tablist">
												<li role="presentation" class="active">
													<a href="#flights" aria-controls="flights" role="tab" data-toggle="tab">Umuttepe Turizm</a>
												</li>
											</ul>

											<!-- Tab panes -->
												<div class="tab-content">
												<div role="tabpanel" class="tab-pane active" id="flights">
													
													<div class="row">
													<div class="col-sm-12 mt">
													<form id="myForm" name="myForm" method="post" action="<?= base_url('main/seferler'); ?>" onsubmit="return formKontrol()">
													<section>
															<div class="cs-radio">
																<input checked="checked" type="radio" id="tek-yon" name="yon" value="tek-yon">
																<label for="tek-yon">Tek Yön</label>
																<input type="radio" id="gidis-donus" name="yon" value="gidis-donus">
																<label for="gidis-donus">Gidiş Dönüş</label>
															</div>
														</section>

														<div class="col-xxs-12 col-xs-6 mt">
															<div class="input-field">
																<label for="from">Nereden:</label>
																<input type="text" class="form-control" id="from-place" name="from-place" list="browsers">
																<datalist id="browsers">
																	<option value="İstanbul">
																	<option value="Ankara">
																	<option value="İzmir">
																	<option value="Kocaeli">
																</datalist>
															</div>
														</div>

														<div class="col-xxs-12 col-xs-6 mt">
															<div class="input-field">
																<label for="to">Nereye:</label>
																<input type="text" class="form-control" id="to-place" name="to-place" list="browsers">
																<datalist id="browsers">
																	<option value="İstanbul">
																	<option value="Ankara">
																	<option value="İzmir">
																	<option value="Kocaeli">
																</datalist>
															</div>
														</div>

														<div class="col-xxs-12 col-xs-6 mt alternate">
															<div class="input-field">
																<label for="gidisTarih">Gidiş Tarihi:</label>
																<input type="date" style="font-weight: bold; font-size14px; background: rgba(0, 0, 0, 0.05); color: #F78536" class="form-control" id="gidisTarih" name="gidisTarih" min="<?= date("Y-m-d"); ?>">
																<label id="dnsText" for="date-end">Dönüş Tarihi:</label>
																<input type="date" style="font-weight: bold; font-size14px; background: rgba(0, 0, 0, 0.05); color: #F78536" class="form-control" id="gelisTarih" name="gelisTarih" min="<?= date("Y-m-d"); ?>">
															</div>
														</div>

														<div class="col-xs-12">
														
															<input name="listele" id="listele" type="submit" class="btn btn-primary btn-block" value="Listele">
														</div>
													</form>


													</div>
												</div>
												</div>

											</div>
										</div>
									</div>
									<div class="desc2 animate-box">
											<div class="col-sm-7 col-sm-push-1 col-md-7 col-md-push-1">
												<div id="map" style="margin-top:-150px;"></div>
											</div>
										</div>
								</div>
							</div>
						</div>

					</div>
					<div id="fh5co-tours" class="fh5co-section-gray" style="display: none;">
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
		
	</body>
	<script>
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

		function formKontrol() {
			var neredenInput = document.getElementById('from-place').value;
			neredenInput = +sehirDegeriniAyarla(neredenInput);
			var nereyeInput = document.getElementById('to-place').value;
			nereyeInput = +sehirDegeriniAyarla(nereyeInput);
			var tekYon = document.getElementById('tek-yon');
			var ciftYon = document.getElementById('gidis-donus');
			var gidisTarihi = document.getElementById('gidisTarih');
			var gelisTarihi = document.getElementById('gelisTarih');
			var cities = ['İstanbul', 'Ankara', 'İzmir', 'Kocaeli'];

			if(neredenInput === nereyeInput && (neredenInput !== 0 || nereyeInput !== 0 )){
				showError("Nereden ile Nereye bilgisi aynı olamaz.");
				return false;
			}
			else if(tekYon.checked && gidisTarihi.value === ''){
				showError("Lütfen gerekli kısımları doldurun");
				return false;
			}
			else if(ciftYon.checked && gelisTarihi.value === ''){
				showError("Lütfen gerekli kısımları doldurun");
				return false;
			}
			else if(neredenInput === 0 || nereyeInput === 0){
				showError("Lütfen doğru illeri seçiniz.");
				return false;
			}
			else{
				var kalkisSehir = +sehirDegeriniAyarla(document.getElementById("from-place").value);
				var gidisSehir = +sehirDegeriniAyarla(document.getElementById("to-place").value);
				var cikisZamani = document.getElementById("gidistarihi").innerText;
				
				var seferID;
				var seferler = <?php echo json_encode($seferler); ?>;
				for (var i = 0; i < seferler.length; i++) {
					if (+seferler[i]['kalkisSehir'] === +kalkisSehir && +seferler[i]['varisSehir'] === +gidisSehir && 
						""+seferler[i]['cikisZamani'] === ""+cikisZamani) {
							document.getElementById("seferVarMi").innerText = "Var";

							break;
					}
					else{
						document.getElementById("seferVarMi").innerText = "Yok";
					}
				}  
				return true;
			}
		}


		function initMap(){
			var options = {
				zoom:6,
				center:{lat:39.925533,lng:32.866287}
			}

			var map = new google.maps.Map(document.getElementById('map'), options);

			var marker1 = new google.maps.Marker({
				position:{lat:41.015137,lng:28.979530},
				map:map
			})

			var marker2 = new google.maps.Marker({
				position:{lat:40.766666,lng:29.916668},
				map:map
			})

			var marker3 = new google.maps.Marker({
				position:{lat:39.925533,lng:32.866287},
				map:map
			})

			var marker4 = new google.maps.Marker({
				position:{lat:38.423733,lng:27.142826},
				map:map
			})

			var returnDateInput = document.getElementById('gelisTarih');
			var dnsText = document.getElementById('dnsText');
			var isOneWaySelected = true; // Başlangıçta tek yön seçili
			returnDateInput.style.display = 'none'; // Tek yönse dönüş tarihi alanını gizle
				dnsText.style.display = 'none';

			document.getElementById('tek-yon').addEventListener('click', function() {
				returnDateInput.style.display = 'none'; // Tek yönse dönüş tarihi alanını gizle
				dnsText.style.display = 'none';
				isOneWaySelected = true;
			});

			// Gidiş dönüşe tıklanırsa
			document.getElementById('gidis-donus').addEventListener('click', function() {
				returnDateInput.style.display = 'block'; // Gidiş dönüşse dönüş tarihi alanını göster
				dnsText.style.display = 'inline';
				isOneWaySelected = false;
			});

			var writeToFromPlace = true; // Başlangıçta from-place'e yazılacak

			google.maps.event.addListener(marker1, 'click', function(event) {
				writeToMapDiv("İstanbul", writeToFromPlace ? "from-place" : "to-place");
				writeToFromPlace = !writeToFromPlace; // Her tıklamada alanı değiştir
			});

			google.maps.event.addListener(marker2, 'click', function(event) {
				writeToMapDiv("Kocaeli", writeToFromPlace ? "from-place" : "to-place");
				writeToFromPlace = !writeToFromPlace; // Her tıklamada alanı değiştir
			});

			google.maps.event.addListener(marker3, 'click', function(event) {
				writeToMapDiv("Ankara", writeToFromPlace ? "from-place" : "to-place");
				writeToFromPlace = !writeToFromPlace; // Her tıklamada alanı değiştir
			});

			google.maps.event.addListener(marker4, 'click', function(event) {
				writeToMapDiv("İzmir", writeToFromPlace ? "from-place" : "to-place");
				writeToFromPlace = !writeToFromPlace; // Her tıklamada alanı değiştir
			});
		}

		function writeToMapDiv(message, id) {
            var mapDiv = document.getElementById(id);
            mapDiv.value = message;
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

	<script async
    	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGiy9PFr5HwCC4Wbkqqx5VQ4l4pArTgfY&loading=async&callback=initMap">
	</script>
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
