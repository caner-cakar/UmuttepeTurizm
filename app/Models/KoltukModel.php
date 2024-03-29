<?php

namespace App\Models;

use CodeIgniter\Model;

class KoltukModel extends Model
{
    protected $table = 'koltuklar'; // Veritabanındaki seferler tablosunu belirtin
    protected $primaryKey = 'koltukID'; // Tablodaki birincil anahtarı (primary key) belirtin
    protected $allowedFields = ['seferID', 'koltukNo', 'durumu', 'yolcuID','biletID'];

    public function koltukYerOlustur($seferID, $koltukNo, $durumu, $yolcuID, $biletID) {
        $this->insert([
            'seferID' => $seferID,
            'koltukNo' => $koltukNo,
            'durumu' => $durumu,
            'yolcuID' => $yolcuID,
            'biletID' => $biletID
        ]);
    }// Eklenebilir ve güncellenebilir alanları belirtin
}
