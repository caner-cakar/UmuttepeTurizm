<?php

namespace App\Models;

use CodeIgniter\Model;

class BiletlerModel extends Model
{
    protected $table = 'biletler'; // Veritabanındaki biletler tablosunu belirtin
    protected $primaryKey = 'biletID'; // Tablodaki birincil anahtarı (primary key) belirtin
    protected $allowedFields = ['kullaniciID', 'seferID', 'koltukID', 'odemeTarih'];
    
    public function koltukBiletOlustur($kullaniciID, $seferID, $koltukID, $odemeTarih) {
        $this->insert([
            'kullaniciID' => $kullaniciID,
            'seferID' => $seferID,
            'koltukID' => $koltukID,
            'odemeTarih' => $odemeTarih
        ]);
    }// Eklenebilir ve güncellenebilir alanları belirtin
}


