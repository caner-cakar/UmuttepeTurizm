
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Hesabım</title>
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
							<?php
                                if (+$loggedUser === 3) {
                                    echo '<li><a href="#">Admin</a></li>';
                                }
                                ?>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		<!-- end:header-top -->
	
        </div>
		</div>
        <div id="fh5co-tours" class="fh5co-section-gray" style="display: block;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2 text-center animate-box fadeInUp animated">
                    <h4>Hesabım</h4><hr>
                    <table>
                        <thead>
                            <tr>
                                <th style="padding-right:55px;">İsim</th>
                                <th style="padding-right:55px;">Mail</th>
                                <th style="padding-right:55px;">Bakiye</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding-right:55px;"><?= ucfirst($userInfo['ad']); ?></td>
                                <td style="padding-right:55px;"><?= $userInfo['mail']; ?></td>
								<td style="padding-right:55px;"><?= $userInfo['bakiye']; ?></td>
                                
                            </tr>
                            
                        </tbody>
						<td style="padding-right:55px;"><a href="<?= site_url('auth/logout') ?>">Çıkış Yap</a></td>
                    </table>
					
                </div>
				
					<div class="col-md-8 col-md-offset-2 text-center animate-box fadeInUp animated">
					
						<?php if (!empty($biletler)): ?>
							<table style=" border-collapse: separate; border-spacing: 0 10px;">
								<tr>
									<th style="padding-right:55px;">Bilet ID</th>
									<th style="padding-right:55px;">Sefer Numarası</th>
									<th style="padding-right:55px;">Koltuk Numarası</th>
									<th style="padding-right:55px;">Ödeme Tarihi</th>
								</tr>
								<?php foreach ($biletler as $bilet): ?>
									<tr>
										<td><?php echo $bilet['biletID']; ?></td>
										<td><?php echo $bilet['seferID']; ?></td>
										<td><?php echo $bilet['koltukID']; ?></td>
										<td><?php echo $bilet['odemeTarih']; ?></td>
										<td>
										<form action="<?= base_url('dashboard/account'); ?>" method="post">
											<div style="text-align: center;">
												<input type="hidden" id="biletID" name="biletID" value="<?php echo $bilet['biletID']; ?>"> <!-- İade edilecek biletin ID'sini gizli bir alan olarak formda gönderiyoruz -->
												<button style="width: 100px; height: 30px; font-size: 14px;" class="btn btn-danger" type="submit">İade Et</button> <!-- İade et butonu -->
											</div>
										</form>
										</td>
									</tr>
								<?php endforeach; ?>
						</table>
					<?php else: ?>
						<p>Kullanıcının henüz bilet bilgisi bulunmamaktadır.</p>
					<?php endif; ?>
					
				</div>
            </div>
        </div>
		</div>
	
		<footer>
			<div id="footer">
				<div class="container">
					<div class="row row-bottom-padded-md">
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>About Travel</h3>
							<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Top Flights Routes</h3>
							<ul>
								<li><a href="#">Manila flights</a></li>
								<li><a href="#">Dubai flights</a></li>
								<li><a href="#">Bangkok flights</a></li>
								<li><a href="#">Tokyo Flight</a></li>
								<li><a href="#">New York Flights</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Top Hotels</h3>
							<ul>
								<li><a href="#">Boracay Hotel</a></li>
								<li><a href="#">Dubai Hotel</a></li>
								<li><a href="#">Singapore Hotel</a></li>
								<li><a href="#">Manila Hotel</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Interest</h3>
							<ul>
								<li><a href="#">Beaches</a></li>
								<li><a href="#">Family Travel</a></li>
								<li><a href="#">Budget Travel</a></li>
								<li><a href="#">Food &amp; Drink</a></li>
								<li><a href="#">Honeymoon and Romance</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Best Places</h3>
							<ul>
								<li><a href="#">Boracay Beach</a></li>
								<li><a href="#">Dubai</a></li>
								<li><a href="#">Singapore</a></li>
								<li><a href="#">Hongkong</a></li>
							</ul>
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 fh5co-footer-link">
							<h3>Affordable</h3>
							<ul>
								<li><a href="#">Food &amp; Drink</a></li>
								<li><a href="#">Fare Flights</a></li>
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Copyright 2016 Free Html5 <a href="#">Module</a>. All Rights Reserved. <br>Made with <i class="icon-heart3"></i> by <a href="http://freehtml5.co/" target="_blank">Freehtml5.co</a> / Demo Images: <a href="https://unsplash.com/" target="_blank">Unsplash</a></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	</div>
	</body>
    
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
