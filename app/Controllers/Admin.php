<?php

namespace App\Controllers;

use App\Models\SeferModel;
use App\Models\KullanicilarModel;

class Admin extends BaseController
{
    protected $seferModel;

    public function __construct()
    {
        $this->seferModel = new SeferModel();
    }
    public function index()
    {
        $seferModel = new SeferModel();
        $data['seferler'] = $seferModel->getSeferlerWithCities();

        return view('admin/anasayfa', $data);
    }
  

    public function add()
    {
        return view('admin/seferEkle');
    }

    public function save()
    {
        $seferModel = new SeferModel();
        $seferModel->insert($this->request->getPost());

        return redirect()->to('admin/seferEkle');
    }

    public function addKullanici()
    {
        return view('admin/kullaniciEkle');
    }

    public function saveUser()
    {
        // Formdan gelen verileri al
        $tcKimlik = $this->request->getPost('tcKimlik');
        $ad = $this->request->getPost('ad');
        $soyad = $this->request->getPost('soyad');
        $dogumTarihi = $this->request->getPost('dogumTarihi');
        $cinsiyet = $this->request->getPost('cinsiyet');
        $cepTelefonu = $this->request->getPost('cepTelefonu');
        $mail = $this->request->getPost('mail');
        $sifre = $this->request->getPost('sifre');
        $bakiye = $this->request->getPost('bakiye');

        // Kullanıcı modelini oluştur
        $kullaniciModel = new KullanicilarModel();

        // Veritabanına ekle
        $kullaniciModel->insert([
            'tcKimlik' => $tcKimlik,
            'ad' => $ad,
            'soyad' => $soyad,
            'dogumTarihi' => $dogumTarihi,
            'cinsiyet' => $cinsiyet,
            'cepTelefonu' => $cepTelefonu,
            'mail' => $mail,
            'sifre' => $sifre,
            'bakiye' => $bakiye
        ]);

        // Kullanıcı eklendikten sonra başka bir sayfaya yönlendir (isteğe bağlı)
        return redirect()->to('/admin/anasayfa');
    }

    public function listUsers()
    {
        $kullaniciModel = new KullanicilarModel();
        $data['kullanicilar'] = $kullaniciModel->findAll();

        return view('admin/kullaniciListesi', $data);
    }

    public function deleteUser()
    {
        $kullaniciID = $this->request->getPost('kullaniciID');

        $kullaniciModel = new KullanicilarModel();
        $kullaniciModel->delete($kullaniciID);

        return redirect()->to(site_url('admin/kullaniciListesi'));
    }
    
    public function goDeleteSefer()
    {
        $seferModel = new SeferModel();
        $seferler = $seferModel->getAllSeferler();

        return view('admin/sefersil', ['seferler' => $seferler]);
    }
    
    public function deleteSefer()
    {
        $seferID = $this->request->getPost('seferID');

        $seferModel = new SeferModel();
        $seferModel->delete($seferID);

        return redirect()->to(site_url('admin/anasayfa'));
    }
}