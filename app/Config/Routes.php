<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 * 
 */
$routes->get('/', 'Auth::index');
 $routes->group('auth', function ($routes) {
    
    $routes->get('login', 'Auth::index');
    $routes->get('register', 'Auth::register');
    $routes->get('check', 'Auth::check'); 
    $routes->get('logout', 'Auth::logout');
    $routes->post('check', 'Auth::check');
    $routes->post('save', 'Auth::save');
});  

$routes->group('',['filter'=>'AuthCheck'],function($routes){
    
    $routes->group('dashboard', function ($routes) {
        $routes->get('account', 'Dashboard::index');
        $routes->post('account', 'Dashboard::index');
    });
    $routes->group('admin', function ($routes) {
        $routes->get('anasayfa', 'Admin::index');
        $routes->post('anasayfa', 'Admin::index');
        $routes->get('seferEkle', 'Admin::add');
        $routes->post('seferEkle', 'Admin::add');
        $routes->get('add', 'Admin::add');
        $routes->post('add', 'Admin::add');
        $routes->get('save', 'Admin::save');
        $routes->post('save', 'Admin::save');
        $routes->get('addKullanici', 'Admin::addKullanici');
        $routes->post('addKullanici', 'Admin::addKullanici');
        $routes->get('saveUser', 'Admin::saveUser');
        $routes->post('saveUser', 'Admin::saveUser');
        $routes->get('kullaniciListesi', 'Admin::listUsers');
        $routes->post('kullaniciListesi', 'Admin::listUsers');
        $routes->post('deleteUser', 'Admin::deleteUser');
        $routes->get('deleteUser', 'Admin::deleteUser');
        $routes->post('deleteSefer', 'Admin::deleteSefer');
        $routes->get('deleteSefer', 'Admin::deleteUser');
        $routes->post('goDeleteSefer', 'Admin::goDeleteSefer');
        $routes->get('goDeleteSefer', 'Admin::goDeleteSefer');

    });
    $routes->group('main', function ($routes) {
        $routes->get('index', 'Main::index');
        $routes->get('payment', 'Payment::payment');
        $routes->get('seferler', 'Main::seferler');
        $routes->get('koltuklar', 'Main::koltuklar');
        $routes->get('odeme', 'Main::odeme');
        $routes->get('odemeTamamlama', 'Main::odemeTamamlama');
        $routes->get('biletkontrol', 'Main::biletkontrol');
        $routes->get('biletEkle', 'Main::biletEkle');
        $routes->post('biletkontrol', 'Main::biletkontrol');
        $routes->post('odemeTamamlama', 'Main::odemeTamamlama');
        $routes->post('biletEkle', 'Main::biletEkle');
        $routes->post('payment', 'Payment::payment');
        $routes->post('seferler', 'Main::seferler');
        $routes->post('index', 'Main::index');
        $routes->post('koltuklar', 'Main::koltuklar');
        $routes->post('odeme', 'Main::odeme');
        $routes->post('delete', 'Main::delete');
        

    }); 
    $routes->group('payment', function ($routes) {
        $routes->post('payment', 'Payment::payment');
        $routes->get('payment', 'Payment::payment');
        
    });  
});




