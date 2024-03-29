<?php

namespace App\Controllers;

use App\Models\BiletlerModel;
use App\Models\KoltukModel;
use App\Models\KullanicilarModel;
use App\Models\SeferModel;
use App\Models\OdemelerModel;

use App\Models\SehirModel;

class Main extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']); // 'form' helper'ını ekliyoruz
        helper('Form');  // Yeni yardımcıyı yükleme
    }
    public function index()
    {
        helper('url');
        $seferlerModel = new SeferModel();
        $sehirlerModel = new SehirModel();
        $data['seferler'] = $seferlerModel->findAll();
        $data['sehirler'] = $sehirlerModel->findAll();

        return view('main/index', $data);
    }

    public function seferler()
    {
       $nereden = $this->request->getPost('from-place');
       $nereye = $this->request->getPost('to-place');
       $gidisTarihi = $this->request->getPost('gidisTarih');
       $gelisTarih = $this->request->getPost('gelisTarih');
       $sehirModel = new SehirModel();
       $neredenSehir = $sehirModel->where('sehirAD', $nereden)->first();
       $nereyeSehir = $sehirModel->where('sehirAD', $nereye)->first();

       if ($neredenSehir && $nereyeSehir) {
        $seferlerModel = new SeferModel();
        $uygunSeferler = $seferlerModel
            ->where('kalkisSehir', $neredenSehir['sehirID'])
            ->where('varisSehir', $nereyeSehir['sehirID'])
            ->where('cikisZamani', $gidisTarihi)
            ->findAll();
    
        }

        if ($neredenSehir && $nereyeSehir && !empty($gelisTarih)) {
            $seferlerModel = new SeferModel();
            $uygunSeferler1 = $seferlerModel
                ->where('kalkisSehir', $nereyeSehir['sehirID'])
                ->where('varisSehir', $neredenSehir['sehirID'])
                ->where('cikisZamani', $gelisTarih)
                ->findAll();
    
            if (empty($uygunSeferler1)) {    
                $kalkisSehir = $this->request->getPost('to-place');
                $varisSehir = $this->request->getPost('from-place');
                $cikisZamani = $this->request->getPost('gelisTarih');
                
                $cikisSaati= 0;
                $varisSaati= 0;
                $yolculukSuresi = 0;
                $otobusAdi = "";
                $koltukTipi = "tekcift";
                $ucret = 0;
    
                $ucret = 0;
                if($kalkisSehir==="İstanbul" && $varisSehir==="Ankara"){
                    
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 8;
                    $otobusAdi = "İstanbul-Ankara Express";
                    $ucret = 400;
                    for ($i = 0; $i < 3; $i++) {
                        
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else if($i == 0){
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati));
                            $varisSaati = date("H:i:s", strtotime($varisSaati));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            
                            'kalkisSehir' => 1,
                            'varisSehir' => 2,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $seferlerModel = new \App\Models\SeferModel();
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
                    
                }elseif($kalkisSehir==='İstanbul' && $varisSehir==='Kocaeli'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 1;
                    $otobusAdi = "İstanbul-Kocaeli Express";
                    $ucret = 200;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 1,
                            'varisSehir' => 4,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='İstanbul' && $varisSehir==='İzmir'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 7;
                    $otobusAdi = "İstanbul-İzmir Express";
                    $ucret = 450;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 1,
                            'varisSehir' => 3,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='Kocaeli' && $varisSehir==='İstanbul'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 1;
                    $otobusAdi = "Kocaeli-İstanbul Express";
                    $ucret = 200;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 4,
                            'varisSehir' => 1,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='Kocaeli' && $varisSehir==='Ankara'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 6;
                    $otobusAdi = "Kocaeli-Ankara Express";
                    $ucret = 350;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 4,
                            'varisSehir' => 2,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='Kocaeli' && $varisSehir==='İzmir'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 7;
                    $otobusAdi = "Kocaeli-İzmir Express";
                    $ucret = 550;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 4,
                            'varisSehir' => 3,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
                }elseif($kalkisSehir==='Ankara' && $varisSehir==='İstanbul'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 6;
                    $otobusAdi = "Ankara-İstanbul Express";
                    $ucret = 375;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 2,
                            'varisSehir' => 1,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();

    
                }elseif($kalkisSehir==='Ankara' && $varisSehir==='Kocaeli'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 6;
                    $otobusAdi = "Ankara-Kocaeli Express";
                    $ucret = 300;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 2,
                            'varisSehir' => 4,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='Ankara' && $varisSehir==='İzmir'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 7;
                    $otobusAdi = "Ankara-İzmir Express";
                    $ucret = 480;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 2,
                            'varisSehir' => 3,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='İzmir' && $varisSehir==='İstanbul'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 7;
                    $otobusAdi = "İzmir-İstanbul Express";
                    $ucret = 350;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 3,
                            'varisSehir' => 1,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='İzmir' && $varisSehir==='Ankara'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 7;
                    $otobusAdi = "İzmir-Ankara Express";
                    $ucret = 430;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 3,
                            'varisSehir' => 2,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }elseif($kalkisSehir==='İzmir' && $varisSehir==='Kocaeli'){
                    $cikisSaati ="00:00:00";
                    $varisSaati ="08:00:00"; 
                    $yolculukSuresi = 7;
                    $otobusAdi = "İzmir-Kocaeli Express";
                    $ucret = 550;
                    for ($i = 0; $i < 3; $i++) {
                        if ($i == 2) {
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                        }else{
                            $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                            $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                        }
                        $values = [
                            'kalkisSehir' => 3,
                            'varisSehir' => 4,
                            'cikisZamani' => $cikisZamani,
                            'cikisSaati' => $cikisSaati,
                            'varisZamani' => $cikisZamani,
                            'varisSaati' => $varisSaati,
                            'yolculukSuresi' => $yolculukSuresi,
                            'otobusAdi' => $otobusAdi,
                            'koltukTipi' => $koltukTipi,
                            'ucret' => $ucret
                        ];
                        $query = $seferlerModel->insert($values);
                    }
                    $data['seferler'] = $seferlerModel->findAll();
    
                }
                else{
                    $data['seferler'] = $seferlerModel->findAll();
                }
                    
                
    
                $data['seferler'] = $seferlerModel->findAll();
            }
        }

       $seferlerModel = new SeferModel();
       

        if (!empty($uygunSeferler)) {
            $data['seferler'] = $seferlerModel->findAll();
            return view('main/seferler', $data);
        } else {
            $kalkisSehir = $this->request->getPost('from-place');
            $varisSehir = $this->request->getPost('to-place');
            $cikisZamani = $this->request->getPost('gidisTarih');
            
            $cikisSaati= 0;
            $varisSaati= 0;
            $yolculukSuresi = 0;
            $otobusAdi = "";
            $koltukTipi = "tekcift";
            $ucret = 0;

            $ucret = 0;
            if($kalkisSehir==="İstanbul" && $varisSehir==="Ankara"){
                
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 8;
                $otobusAdi = "İstanbul-Ankara Express";
                $ucret = 400;
                for ($i = 0; $i < 3; $i++) {
                    
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else if($i == 0){
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati));
                        $varisSaati = date("H:i:s", strtotime($varisSaati));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        
                        'kalkisSehir' => 1,
                        'varisSehir' => 2,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $seferlerModel = new \App\Models\SeferModel();
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);
                
            }elseif($kalkisSehir==='İstanbul' && $varisSehir==='Kocaeli'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 1;
                $otobusAdi = "İstanbul-Kocaeli Express";
                $ucret = 200;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 1,
                        'varisSehir' => 4,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='İstanbul' && $varisSehir==='İzmir'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 7;
                $otobusAdi = "İstanbul-İzmir Express";
                $ucret = 450;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 1,
                        'varisSehir' => 3,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='Kocaeli' && $varisSehir==='İstanbul'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 1;
                $otobusAdi = "Kocaeli-İstanbul Express";
                $ucret = 200;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 4,
                        'varisSehir' => 1,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='Kocaeli' && $varisSehir==='Ankara'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 6;
                $otobusAdi = "Kocaeli-Ankara Express";
                $ucret = 350;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 4,
                        'varisSehir' => 2,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='Kocaeli' && $varisSehir==='İzmir'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 7;
                $otobusAdi = "Kocaeli-İzmir Express";
                $ucret = 550;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 4,
                        'varisSehir' => 3,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='Ankara' && $varisSehir==='İstanbul'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 6;
                $otobusAdi = "Ankara-İstanbul Express";
                $ucret = 375;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 2,
                        'varisSehir' => 1,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='Ankara' && $varisSehir==='Kocaeli'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 6;
                $otobusAdi = "Ankara-Kocaeli Express";
                $ucret = 300;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 2,
                        'varisSehir' => 4,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='Ankara' && $varisSehir==='İzmir'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 7;
                $otobusAdi = "Ankara-İzmir Express";
                $ucret = 480;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 2,
                        'varisSehir' => 3,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='İzmir' && $varisSehir==='İstanbul'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 7;
                $otobusAdi = "İzmir-İstanbul Express";
                $ucret = 350;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 3,
                        'varisSehir' => 1,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='İzmir' && $varisSehir==='Ankara'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 7;
                $otobusAdi = "İzmir-Ankara Express";
                $ucret = 430;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 3,
                        'varisSehir' => 2,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }elseif($kalkisSehir==='İzmir' && $varisSehir==='Kocaeli'){
                $cikisSaati ="00:00:00";
                $varisSaati ="08:00:00"; 
                $yolculukSuresi = 7;
                $otobusAdi = "İzmir-Kocaeli Express";
                $ucret = 550;
                for ($i = 0; $i < 3; $i++) {
                    if ($i == 2) {
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +7 hours 59 minutes"));
                    }else{
                        $cikisSaati = date("H:i:s", strtotime($cikisSaati . " +8 hours"));
                        $varisSaati = date("H:i:s", strtotime($varisSaati . " +8 hours"));
                    }
                    $values = [
                        'kalkisSehir' => 3,
                        'varisSehir' => 4,
                        'cikisZamani' => $cikisZamani,
                        'cikisSaati' => $cikisSaati,
                        'varisZamani' => $cikisZamani,
                        'varisSaati' => $varisSaati,
                        'yolculukSuresi' => $yolculukSuresi,
                        'otobusAdi' => $otobusAdi,
                        'koltukTipi' => $koltukTipi,
                        'ucret' => $ucret
                    ];
                    $query = $seferlerModel->insert($values);
                }
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);

            }
            else{
                $data['seferler'] = $seferlerModel->findAll();
                return view('main/seferler', $data);
            }
        }
    }


    public function koltuklar()
    {
        helper('url');
        $koltuklarModel = new KoltukModel();
        $seferlerModel = new SeferModel();

        $data['koltuklar'] = $koltuklarModel->findAll();   
        $data['seferler'] = $seferlerModel->findAll();
        return view('main/koltuklar',$data);
    }

    public function biletkontrol(){
        helper('url');
        $koltuklarModel = new KoltukModel();
        $seferlerModel = new SeferModel();

        
        $data['koltuklar'] = $koltuklarModel->findAll();   
        $data['seferler'] = $seferlerModel->findAll();

        return view('main/biletkontrol',$data);
    }

    public function odeme(){
        $postKoltuklar = array();

        $postData = $this->request->getPost();

        $toplamUcret = $this->request->getPost('toplamUcret');
        $data['toplamUcret'] = $toplamUcret;

        // Post edilen veriler içinde dönelim
        foreach ($postData as $key => $value) {
            // Eğer key koltukId_ ile başlıyorsa ve key'in sonunda bir rakam varsa
            if (strpos($key, 'koltukId_') === 0 && is_numeric(substr($key, 9))) {
                // Koltuk numarasını al ve postKoltuklar dizisine ekle
                $koltukNumarasi = substr($key, 9);
                $postKoltuklar[] = $value;
            }
        }

        if (!empty($postKoltuklar) && count($postKoltuklar) <= 4) {
            // Koltuk ID'lerini bir değişkene atayalım
            $data['secilenKoltuklar'] = $postKoltuklar;
        } else {
            // Hata durumu veya başka bir işlem
        }
        
        return view('main/odeme',$data);
    }

    public function odemeTamamlama(){
        $secilenKoltuklar = $this->request->getPost('secilenKoltuklar');
        $seferID = $this->request->getPost('seferID');
        $toplamUcret = $this->request->getPost('toplamUcret');

    if (!empty($secilenKoltuklar)) {
        $biletlerModel = new BiletlerModel();
        $odemelerModel = new OdemelerModel();
        $koltukModel = new KoltukModel();

        // Her bir seçilen koltuk için
        foreach ($secilenKoltuklar as $koltukID) {
            // Bilet bilgilerini oluşturalım
            $biletVerisi = [
                'kullaniciID' => session()->get('loggedUser'), // Kullanıcı ID'si
                'seferID' => $seferID, // Sefer ID'si
                'koltukID' => $koltukID, // Koltuk ID'si
                'odemeTarih' => date('Y-m-d H:i:s') // Ödeme tarihi
            ];
            $biletlerModel->insert($biletVerisi);
            $biletID = $biletlerModel->insertID();
            // Ödeme bilgilerini de ekleyelim
            $odemeVerisi = [
                'kullaniciID' => session()->get('loggedUser'), // Kullanıcı ID'si
                'biletID' => $biletlerModel->insertID(), // Eklenen biletin ID'si
                'odemeTarih' => date('Y-m-d H:i:s'), // Ödeme tarihi
                'odemeMiktar' => $toplamUcret// Örnek bir ödeme miktarı, değiştirebilirsiniz
            ];
            $odemelerModel->insert($odemeVerisi);

            $koltukVerisi = [
                'seferID' => $seferID, 
                'koltukNo' => $koltukID,
                'durumu' => 'dolu', 
                'yolcuID' => session()->get('loggedUser'),
                'biletID' =>  $biletID
            ];

            $koltukModel->insert($koltukVerisi);
        }

        // Biletler başarıyla eklendiyse başka bir işlem yapabiliriz, örneğin kullanıcıyı yönlendirebiliriz
        return redirect()->to('dashboard/account'); // Örnek bir yönlendirme
    } else {
        // Eğer seçilen koltuklar yoksa, hata mesajı gösterebiliriz veya başka bir işlem yapabiliriz
        return "Lütfen bir koltuk seçiniz.";
    }
        }
    
 
}
