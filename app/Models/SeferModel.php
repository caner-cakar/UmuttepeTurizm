<?php

namespace App\Models;

use CodeIgniter\Model;

class SeferModel extends Model
{
    protected $table = 'seferler'; // Veritabanındaki seferler tablosunu belirtin
    protected $primaryKey = 'seferID';
    protected $allowedFields = ['kalkisSehir','varisSehir','cikisZamani','cikisSaati','varisZamani','varisSaati','yolculukSuresi','otobusAdi','koltukTipi','ucret'];

    public function getSeferlerWithCities()
    {
        return $this->select('seferler.*, kalkis.sehirAD as kalkisSehirAd, varis.sehirAD as varisSehirAd')
                    ->join('sehirler as kalkis', 'kalkis.sehirID = seferler.kalkisSehir')
                    ->join('sehirler as varis', 'varis.sehirID = seferler.varisSehir')
                    ->findAll();
    }

    public function getAllSeferler()
    {
        return $this->findAll();
    }
}
