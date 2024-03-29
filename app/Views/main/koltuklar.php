
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
	
        </div>
		</div>
            <div id="fh5co-tours" class="koltuk-still" style="margin-top: -50px;">
         
		
			    <div class="koltuk_gorseli">
				<li>
					<div class="koltuk"></div>
					<small>Boş</small>
				</li>
				<li>
					<div class="koltuk rezerve"></div>
					<small>Rezerve</small>
				</li>
				<li>
					<div class="koltuk dolu"></div>
					<small>Dolu</small>
				</li>
			    </div>
			    <div class="oturma_duzeni">
				<div class="on_cam"></div>
				<div class="siralar">
					<div class="koltuk" id="1">1</div>
					<div class="koltuk" id="2">2</div>
					<div class="koltuk" id="3">3</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="4">4</div>
					<div class="koltuk" id="5">5</div>
					<div class="koltuk" id="6">6</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="7">7</div>
					<div class="koltuk" id="8">8</div>
					<div class="koltuk" id="9">9</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="10">10</div>
					<div class="koltuk" id="11">11</div>
					<div class="koltuk" id="12">12</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="13">13</div>
					<div class="koltuk" id="14">14</div>
					<div class="koltuk" id="15">15</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="16">16</div>
					<div class="koltuk" id="17">17</div>
					<div class="koltuk" id="18">18</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="19">19</div>
					<div class="koltuk" id="20">20</div>
					<div class="koltuk" id="21">21</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="22">22</div>
					<div class="koltuk" id="23">23</div>
					<div class="koltuk" id="24">24</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="25">25</div>
					<div class="koltuk" id="26">26</div>
					<div class="koltuk" id="27">27</div>
				</div>
				<div class="siralar">
					<div class="koltuk" id="28">28</div>
					<div class="koltuk" id="29">29</div>
					<div class="koltuk" id="30">30</div>
				</div>
			    </div>
				<button id="biletGonderButton" class="btn btn-primary">Biletleri Gönder</button>


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
	<script>   
            const oturmaDuzeni = document.querySelector('.oturma_duzeni');
            const koltuklar = document.querySelectorAll('.oturma_duzeni .koltuk:not(.dolu)');
            var dbKoltuklar = <?php echo json_encode($koltuklar); ?>;

            var seferID = <?php echo $_POST["seferID"]; ?>
			
			

            var cocuk = document.querySelector("#cocuk");
            var yetiskin = document.querySelector("#yetiskin");
            var yasli = document.querySelector("#yasli");

			let secilenKoltuklar = {
    seferID: seferID,
    koltuklar: []
}; // Her koltuk için bilgileri tutacak nesne


            // dbKoltuklar içinde dolaşarak dolu olan koltukları işaretleyeceğiz.
            for (let i = 0; i < dbKoltuklar.length; i++) {
                const koltuk = dbKoltuklar[i];
                if (koltuk.durumu === 'dolu' && seferID === parseInt(koltuk.seferID)) {
                    // Dolu olan koltuğun ID'sini alarak ilgili HTML elementini bulup işaretleyeceğiz.
                    const doluKoltukElementi = document.getElementById(koltuk.koltukNo);
                    if (doluKoltukElementi) {
                        doluKoltukElementi.classList.add('dolu');
                    }
                }
            }

            // Oturma düzeni üzerine tıklama olayını dinleyen kod
			oturmaDuzeni.addEventListener('click', (e) => {
				if (e.target.classList.contains('koltuk') && !e.target.classList.contains('dolu')) {
					if (!e.target.classList.contains('secilmis') && secilenKoltuklar.koltuklar.length < 4) {
						e.target.classList.add('secilmis');
						secilenKoltuklar.koltuklar.push(e.target.id); // Seçilen koltuk ID'sini listeye ekle
					} else if (e.target.classList.contains('secilmis')) {
						e.target.classList.remove('secilmis');
						const index = secilenKoltuklar.koltuklar.indexOf(e.target.id);
						if (index !== -1) {
							secilenKoltuklar.koltuklar.splice(index, 1); // Koltuk listeden çıkarılacaksa sil
						}
					} else {
						showError("En fazla 4 koltuk seçebilirsiniz!");
					}
				}
			});

			document.getElementById('biletGonderButton').addEventListener('click', () => {
    			// Seçilen koltukları al
				const secilenKoltuklar = document.querySelectorAll('.koltuk.secilmis');
				
				// Seçilen koltukların ID'lerini içeren bir dizi oluştur
				const secilenKoltukIdleri = [];
				secilenKoltuklar.forEach((koltuk) => {
					secilenKoltukIdleri.push(koltuk.id);
				});
				
				// Formu oluştur ve seçilen koltukları bu forma ekleyerek gönder
				const form = document.createElement('form');
				form.method = 'POST';
				form.action = '<?= base_url('main/biletkontrol'); ?>';
				
				secilenKoltukIdleri.forEach((koltukId) => {
					const input = document.createElement('input');
					input.type = 'hidden';
					input.name = 'secilenKoltuklar[]'; 
					input.value = koltukId;
					form.appendChild(input);
				});

				const input2 = document.createElement('input');
				input2.type = 'text';
				input2.name = 'seferID'; 
				input2.value = seferID;
				form.appendChild(input2);
				document.body.appendChild(form);
				form.submit();
			});




     
     

		function selectTrip() {
			// Seferi seçme işlemi
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
	<script type="text/javascript" src="<?php echo base_url()?>js/koltukscript.js"></script>				
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
