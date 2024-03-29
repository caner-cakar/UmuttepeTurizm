<?php

namespace App\Models;

use CodeIgniter\Model;

class KullanicilarModel extends Model
{
    protected $table = 'kullanicilar'; // Veritabanındaki seferler tablosunu belirtin
    protected $primaryKey = 'kullaniciID'; // Tablodaki birincil anahtarı (primary key) belirtin
    protected $allowedFields = ['tcKimlik', 'ad', 'soyad', 'dogumTarihi', 'cinsiyet','cepTelefonu', 'mail', 'sifre','bakiye'];
}
