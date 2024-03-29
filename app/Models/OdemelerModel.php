<?php

namespace App\Models;

use CodeIgniter\Model;

class OdemelerModel extends Model
{
    protected $table = 'odemeler'; // Veritabanındaki biletler tablosunu belirtin
    protected $primaryKey = 'odemeID'; // Tablodaki birincil anahtarı (primary key) belirtin
    protected $allowedFields = ['kullaniciID', 'biletID', 'odemeTarih', 'odemeMiktar'];
    
    public function koltukOdemeOlustur($kullaniciID, $biletID, $odemeTarih, $odemeMiktar) {
        $this->insert([
            'kullaniciID' => $kullaniciID,
            'biletID' => $biletID,
            'odemeTarih' => $odemeTarih,
            'odemeMiktar' => $odemeMiktar
        ]);
    }
}


