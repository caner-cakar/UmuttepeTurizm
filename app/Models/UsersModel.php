<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'kullanicilar';
    protected $primaryKey = 'kullaniciID';
    protected $allowedFields = ['tcKimlik','ad','soyad','dogumTarihi','mail','sifre'];

}
